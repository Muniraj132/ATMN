<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AtmnRequest;
use App\Http\Controllers\Controller;
use App\Helpers\ATMNHelper;
use App\Models\Atmn;
use App\Models\district;
use App\Models\locationsdata;
use App\Models\countries;
use App\Models\state;
use App\Models\User;
use App\Models\UnAvailable;
use App\Models\ministry_type;
use App\Models\AtmnBriefHistory;
use App\Models\attachments;
use App\Models\comfortable_serving_church;
use App\Models\ministry_area;
use App\Models\peacemaking;
use App\Models\pastorassign;
use App\Models\applicationcomments;
use App\Models\status_history;
use App\Models\TempUser;
use App\Models\userstatuscomments;
use App\Models\prefer_serve_church;
use App\Models\contactusreport;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Middleware\App;
use Redirect;
use Session;
use File;
use Auth;
use Carbon;

class UsersController extends Controller {

    public function userslist(){
        $userslist = User::orderBy('id', 'DESC')->get();
        $district = district::all();
        return view('frontend.admin.userslist',compact('userslist','district'));
    }

    public function districtstafflist(){
        $districtstafflist= User::where('district_id','!=',Null)
        // ->where('status','=','Active')
        // ->where('district_id','!=','National Office')
        ->get();
        $district = district::all();
        return view('frontend.admin.district-staff-list',compact('districtstafflist','district'));
    }

    public function trashlist(){
        $trashuserslist = TempUser::orderBy('id', 'DESC')->get();
        $counttrashuserslist = count($trashuserslist);
        $district = district::all();
        return view('frontend.admin.trash',compact('district','trashuserslist','counttrashuserslist'));
    }

    public function contactusreport(){
        $contactusreportlist = contactusreport::orderBy('id', 'DESC')->get();
        $countcontactusreportlist = count($contactusreportlist);
        $district = district::all();
        return view('frontend.admin.contact-us-report',compact('district','contactusreportlist','countcontactusreportlist'));
    }

    public function getreportdata(Request $request){

        $id = $request->id;
        $getreportdata = contactusreport::where('id',$id)->first();
        return response()->json(['success'=> $getreportdata]);
        
    }

    public function deletereport(Request $request){
        $id = $request->id;
        $contactusreport = contactusreport::where('id', $id)->first();
        $contactusreport->delete();
        return response()->json(['success'=> 'success','data'=>$id]);
    }

    public function getname(Request $request){
        $id = $request->id;
        $userdata = User::where('id',$id)->first();
        if($userdata == null){
            $userrecord = TempUser::where('original_id',$id)->first(); 
            $username  = $userrecord->username;
        }else{
            $username = $userdata['username'];
        }
        return response()->json(['success'=> $username]);
    }

    public function currentdistrictpastor(Request $request){
        $district_id = $request->district_id;
        
        $userdata = User::where('district_id',$district_id)->first();
        // dd($userdata);
        if($userdata == null){
            return response()->json(['success'=> "no record"]);
        }else{
             return response()->json(['success'=> "already exists",'district'=> $userdata]);
        }
    }

    public function getusertype(Request $request){
        $user_id = $request->id;
        $getusertype = User::where('id',$user_id)->get();
        return response()->json(['success'=> $getusertype]);
    }
    
    public function getuserstatus(Request $request){
        $user_id = $request->id;
        $getuserstatus = User::where('id',$user_id)->first();
        $val = $getuserstatus->status;
        if($val == "Active"){
            $comment = '';
        }else{
            $getcomment = userstatuscomments::where('user_id',$user_id)->first();
            if(empty($getcomment)){
                $comment = '';
            }else{
                $comment = $getcomment->comments;
            }
        }
        return response()->json(['success'=> $getuserstatus,'data'=>$comment]);
    }

    public function roleassign(Request $request){
        $id = $request->id;
        $user_type = $request->user_type;
        if($user_type == ''){
            $district_id = null;
        }else{
            $district_id = $request->district_id;
        }
        $input = ([
            'user_type' => $user_type,
            'district_id' => $district_id
            ]);
        $userdata = User::where('id', $id)->first();
        $userdata->update($input);
        $usergetdata = User::where('id', $id)->first();
        return response()->json(['success'=> 'Success','data'=>$usergetdata]);
    }

    
    public function getstatus(Request $request){ 
   
        $id = $request->id;
        $getstatus = userstatuscomments::where('user_id', $id)->first();
        return response()->json(['data'=>$getstatus['comments']]);
    }


    public function userstatusupdate(Request $request){
        
        $id = $request->id;
        $status = $request->user_status;
        $comment = $request->comment;
        if(empty($comment)){
            $input = ([
                'status' => $status
            ]);
            $userdata = User::where('id', $id)->first();
            $userdata->update($input);
            $userstatuscomments = userstatuscomments::where('user_id', $id)->first();
            $userstatuscomments->forcedelete();
            $usergetdata = User::where('id', $id)->first();
            return response()->json(['success'=> 'Success','data'=>$usergetdata]);
        }else{
            $inputcomment = ([
                'user_id'   => $id,
                'status'    => $status,
                'comments'   => $comment
            ]);
            $inputuser = ([
                'status' => $status
            ]);
            $userstatuscomments = new userstatuscomments($inputcomment);
            $userstatuscomments->save();
            $userdata = User::where('id', $id)->first();
            $userdata->update($inputuser);

            $usergetdata = User::where('id', $id)->first();
            return response()->json(['success'=> 'Success','data'=>$usergetdata]);
        }
        
        
    }

    public function statusupdate(Request $request){
        $id = $request->id;
        $status = $request->status;
        $input = ([
            'status' => $status
            ]);
        $userdata = User::where('id', $id)->first();
        $userdata->update($input);
        $usersdata = User::where('id', $id)->first();
        return response()->json(['success'=> $request->status,'data'=>$usersdata]);
    }

    public function deleteuser(Request $request){
        $id = $request->id;
        $userdata = User::where('id', $id)->first();
        $input = array( 
                    'original_id'   => $userdata->id,
                    'name'          => $userdata->name,
                    'username'      => $userdata->username,
                    'user_type'     => $userdata->user_type,
                    'email'         => $userdata->email,
                    'status'        => $userdata->status,
                    'requestforstaff' => $userdata->requestforstaff,
                    'requeststaffdistrict' => $userdata->requeststaffdistrict,
                    'password'      => $userdata->password,
                    'district_id'   => $userdata->district_id,
                    'created_date'  => $userdata->created_at,
                    'updated_date'    => $userdata->updated_at,
                );
        $Atmn = Atmn::where('user_id', $id)->delete();
        $atmnBriefHistory = AtmnBriefHistory::where('user_id', $id)->delete();
        $UnAvailable = UnAvailable::where('user_id', $id)->delete();
        $status_history = status_history::where('user_id', $id)->delete();
        $attachments = attachments::where('user_id', $id)->delete();
        $pastorassign = pastorassign::where('pastor_id', $id)->delete();
        $applicationcomments = applicationcomments::where('pastor_id', $id)->delete();
        $TempUser = new TempUser($input);
        $TempUser->save();
        $userdata->delete();
        return response()->json(['success'=> 'success','data'=>$userdata]);
    }


    public function restoreuser(Request $request)
    {        
        $id = $request->id;
        $TempUser = TempUser::where('original_id', $id)->first();

        $userName = $TempUser->username;
        $email = $TempUser->email;

        $rowsdata = User::query()->Where('username', 'LIKE',"%{$userName}%")->orWhere('email', 'LIKE',"%{$email}%");
        $data = $rowsdata->first();

        if($data == null){
            $input = array( 
                'name'          => $TempUser->name,
                'username'      => $TempUser->username,
                'user_type'     => $TempUser->user_type,
                'email'         => $TempUser->email,
                'status'        => $TempUser->status,
                'requestforstaff' => $TempUser->requestforstaff,
                'requeststaffdistrict' => $TempUser->requeststaffdistrict,
                'password'      => $TempUser->password,
                'district_id'   => $TempUser->district_id,
                'created_at'    => $TempUser->created_date,
            );
            $Atmn = Atmn::onlyTrashed()->where('user_id', $id)->restore();
            $atmnBriefHistory = atmnBriefHistory::onlyTrashed()->where('user_id', $id)->restore();
            $UnAvailable = UnAvailable::onlyTrashed()->where('user_id', $id)->restore();
            $status_history = status_history::onlyTrashed()->where('user_id', $id)->restore();
            $pastorassign = pastorassign::onlyTrashed()->where('pastor_id', $id)->restore();
            $attachments = attachments::onlyTrashed()->where('user_id', $id)->restore();
            $applicationcomments = applicationcomments::onlyTrashed()->where('pastor_id', $id)->restore();
            $User = new User($input);
            $User->save();
            $userdata = User::where('id', $User->id)->update(['id' => $id]);
            $TempUser->delete();
            return response()->json(['success'=> 'success','data'=> $id,'username'=>$userName]);
        }else{
            return response()->json(['success'=> 'error','data'=> "already exists" ,'username'=>$userName]);
        }
        
    }

    public function permanentdelete(Request $request)
    {        
        $id = $request->id;
        $TempUser = TempUser::where('original_id', $id)->first();

        $Atmn = Atmn::onlyTrashed()->where('user_id', $id)->forcedelete();
        $atmnBriefHistory = atmnBriefHistory::onlyTrashed()->where('user_id', $id)->forcedelete();
        $UnAvailable = UnAvailable::onlyTrashed()->where('user_id', $id)->forcedelete();
        $status_history = status_history::onlyTrashed()->where('user_id', $id)->forcedelete();
        $pastorassign = pastorassign::onlyTrashed()->where('pastor_id', $id)->forcedelete();
        $attachments = attachments::onlyTrashed()->where('user_id', $id)->forcedelete();
        $applicationcomments = applicationcomments::onlyTrashed()->where('pastor_id', $id)->forcedelete();
        $TempUser->delete();

        $User = TempUser::where('original_id', $id)->first();
        if($User == null){
            return response()->json(['success'=> 'success','data'=> $id]);
        }else{
            return response()->json(['success'=> 'error']);
        }
       
    }

}