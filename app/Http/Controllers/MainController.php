<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Main Controller Class
 * Provides functionality for maintainining the Main detail for Frontend
 *
 * @Package             Controllers
 * @Author              Cyril P
 * @Created On          23-05-2018
 * @Modified            Cyril P
 * @Modified On         26-06-2018
 * @Reviewed            Loganathan N
 */
namespace App\Http\Controllers;

use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Cms;
use App\User;
use Hash;
use DB;
use Mail;
use App\Helpers\STCHelper;
use App\UserOnline;
use App\Models\resourcefiles;
use App\Models\opportunities;
use App\Models\Degree;
use App\Models\Country;
use App\Models\State;
use App\Models\Discipline;
use App\Models\Messages;
use App\Models\UserRequestFiles;
use App\Models\UserRequestFilesOnline;
use App\Models\FeedbackOnline;
use App\Models\contactusreport;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use Carbon\Carbon;

class MainController extends Controller
{

    protected $error = 'error';
    protected $success = 'success';
    protected $updatemsg = 'main.user.updateprofilesuccess';
    protected $updatepwdmsg = 'main.user.updatepwdsuccess';
    protected $pwderrormsg = 'main.user.pwderrormsg';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $files = resourcefiles::where('active_status','Publish')->get();
        $opportunities = opportunities::where('active_status','Publish')->get();
        $opportunitiescount = count($opportunities);
        return view('frontend.layouts.home',compact('files','opportunities','opportunitiescount'))->with('no', 1);
    }

    public function privacypolicy()
    { 
        return view('frontend.includes.privacy-policy');
    }
    
    public function getstarted()
    { 
        return view('frontend.includes.getstarted');
    }

    public function explorefindout()
    { 
        return view('frontend.includes.explorefindout');
    }

    public function sendmessage(Request $request)
    { 
        $input = $request->all();
        $data  = new contactusreport($input);
        $data->save();

        $contactusreport = contactusreport::all();

        $bodyContent = [
                            'toName' => $input['name'],
                            'email' => $input['email'],
                            'subject' => $input['subject'],
                            'Message'=> $input['message'],
                        ];

        $email = "atmn.cmalliance.org";
        
        try {
            \Mail::to($email)->send(new \App\Mail\SendMessage($bodyContent));
            $msg = "success";
            } 
            catch (\Exception $e) {
            $msg = "not sent";
        }
        return response()->json(['data'=> $msg]); 
    }


}