<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\Upload;
use File;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Helpers\ATMNHelper;
use App\Models\Atmn;

use App\Models\user;

class HomeController extends Controller
{
	protected $error = 'error';
    protected $success = 'success';
    protected $updatemsg = 'main.user.updateprofilesuccess';
    protected $updatepwdmsg = 'main.user.updatepwdsuccess';
    protected $pwderrormsg = 'main.user.pwderrormsg';
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard');
		 //return redirect('admin/dashboard/welcome');
    }
	
	/**
     * To view the Profiles
     */
    public function profileView($id)
    { //die('enter');
        $data['user'] = User::findorfail($id);
        return view('admin/updateProfile', $data);
    }

    /**
     * To update the Profile
     */
    public function updateProfile(UserRequest $request,$id)
    { 
		$input = $request->all();
       //echo '<pre>'; print_r($id);exit;
		$user_id = auth()->user()->id;  
        $obj_user = User::find($user_id);
        //$userData = User::findorfail($id);
        //$userData->fill($input);
		$obj_user->name = $input['name'];
		$obj_user->email = $input['email'];
        $filedata = Upload::upload_profile($request->file('profile_picture'));
        if ($filedata) {
        $obj_user['profile_picture'] = $filedata['fileOriginalName'];
        }
        $obj_user->save();  
		if($obj_user){ 
               
				 return Redirect::back()->with($this->success, trans($this->updatemsg));
              
            }else{ 
                
				session()->flash('error', 'Profile Update Failed');
                return view('admin/updateProfile');
            }
	}

	
	/**
     * To show the Admin change Password form
     */
     public function changePassword($id)
     { 
        $user_id = ATMNHelper::decryptUrl($id);
        $data['user'] = User::findorfail($user_id);
        return view('auth/passwords/reset', $data);
     }
	 
	 /**
     *  To update the Password
     */
    public function updatePassword(Request $request)
    {
            $input = $request->all();
            $user_id = auth()->user()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($input['password']);
            $obj_user->save();
            $data = Atmn::where('user_id',$user_id)->first();
            $data = $data ?? '';
            $status = $data->status ?? Null;

            if($obj_user){
                Session::flash('password-reset-success', 'Password Changed Successfully');
                return view('frontend.app.profile',compact('data','status'))->with('password-reset-success');
            }else{ 
				session()->flash('error', 'Password change Failed');
                return view('frontend.app.profile',compact('data','status'))->with('error');
            }
    }
}
