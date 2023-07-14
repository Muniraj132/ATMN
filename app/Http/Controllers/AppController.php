<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22 
 * Atmn Controller Class
 * Provides functionality for maintainining the slider detail for Frontend
 *
 * @Package             Controllers
 * @Author              Mcgdev3
 * @Created On          17-02-2022
 * @Modified            Mcgdev3
 * @Modified On         23-03-2022 
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AtmnRequest;
use App\Http\Controllers\Controller;
use App\Helpers\ATMNHelper;
use App\Models\Atmn;
use App\Models\atmnBriefHistory;
use App\Models\district;
use App\Models\locationsdata;
use App\Models\countries;
use App\Models\state;
use App\Models\User;
use App\Models\UnAvailable;
use App\Models\ministry_type;
use App\Models\attachments;
use App\Models\peacemaking;
use App\Models\comfortable_serving_church;
use App\Models\ministry_area;
use App\Models\pastorassign;
use App\Models\assignstatushistory;
use App\Models\status_history;
use App\Models\prefer_serve_church;
use App\Models\applicationcomments;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Middleware\App;
use Redirect;
use Session;
use File;
use Auth;
use Carbon;
use DB;

class AppController extends Controller
{

    /**
     * Display a listing of the all the resource
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $isUSER = ATMNHelper::isUSER();
        // ATMNHelper::getAppId($isUSER);
        $district_id =  Auth::user()->district_id;

        $user_id =  Auth::user()->id;
        $district_name = district::select('district')->where('d_id',$district_id)->get();

        $data = Atmn::all();

        $currentDate = Carbon\Carbon::now()->toDateString();

        $adminappapppendinglist = Atmn::select('status','district_id')->where( 'status' , 'Pending')->get();
        $adminappappapprovelist = Atmn::select('status')->where('status' , 'Approve')->get();
        $adminbriefpendinglist = AtmnBriefHistory::select('brief_status','d_id')->where( 'brief_status' , 'Pending')->get();
        $adminbriefapprovelist = AtmnBriefHistory::select('brief_status','d_id')->where('brief_status' , 'Approved')->get();
        
        $placedData = DB::table('atmn_recruitment')->select()
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.status', '=', 'Approve')
            ->where('pastor_assign.status','=','placed')
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->where('pastor_assign.assign_end_date','>=',$currentDate)
            ->where('pastor_assign.assign_start_date','<=',$currentDate)
            ->get();

        $availableData = DB::table('atmn_recruitment')->select()
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.status', '=', "Approve")
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->where('pastor_assign.status','=',null)
            ->orwhere('pastor_assign.assign_end_date','<',$currentDate)
            ->orwhere('pastor_assign.assign_start_date','>',$currentDate)
            ->get();

        if($district_id == "National Office"){
            $dsapppendinglist = Atmn::select('status','district_id')->where('status' , 'Pending')->get();
            $dsappapprovelist = Atmn::select('status','district_id')->where('status' , 'Approve')->get();
            $briefdspendinglist = atmnBriefHistory::select('brief_status','d_id')->where('brief_status' , 'Pending')->get();
            $briefdsapprovelist = atmnBriefHistory::select('brief_status','d_id')->where('brief_status' , 'Approved')->get();
            
            $dsplacedData = DB::table('atmn_recruitment')->select()
                ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
                ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
                ->where('users.user_type','=',Null)
                ->where('atmn_recruitment.status', '=', 'Approve')
                ->where('pastor_assign.status','=','placed')
                ->where('atmn_recruitment.deleted_at', '=', Null)
                ->where('pastor_assign.assign_end_date','>=',$currentDate)
                ->where('pastor_assign.assign_start_date','<=',$currentDate)
                ->get();

            $dsavailableData = DB::table('atmn_recruitment')->select()
                ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
                ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
                ->where('users.user_type','=',Null)
                ->where('atmn_recruitment.status', '=', "Approve")
                ->where('atmn_recruitment.deleted_at', '=', Null)
                ->where('pastor_assign.status','=',null)
                ->orwhere('pastor_assign.assign_end_date','<',$currentDate)
                ->orwhere('pastor_assign.assign_start_date','>',$currentDate)
                ->get();

            $district_value = 'National Office' ?? '';

        }else{
            $dsapppendinglist = Atmn::select('status','district_id')->where([['district_id',$district_id],[ 'status' , 'Pending']])->get();
            $dsappapprovelist = Atmn::select('status','district_id')->where([['district_id',$district_id],[ 'status' , 'Approve']])->get();
            $briefdspendinglist = atmnBriefHistory::select('brief_status','d_id')->where([['d_id',$district_id],[ 'brief_status' , 'Pending']])->get();
            $briefdsapprovelist = atmnBriefHistory::select('brief_status','d_id')->where([['d_id',$district_id],[ 'brief_status' , 'Approved']])->get();
            $dsplacedData = DB::table('atmn_recruitment')->select()
                ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
                ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
                ->where('users.user_type','=',Null)
                ->where('atmn_recruitment.district_id', '=',$district_id )
                ->where('atmn_recruitment.status', '=', 'Approve')
                ->where('pastor_assign.status','=','placed')
                ->where('pastor_assign.assign_end_date','>=',$currentDate)
                ->where('pastor_assign.assign_start_date','<=',$currentDate)
                ->where('atmn_recruitment.deleted_at', '=', Null)
                ->get();
            $dsavailableData = DB::table('atmn_recruitment')->select()
                ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
                ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
                ->where('users.user_type','=',Null)
                ->where('atmn_recruitment.district_id', '=', $district_id)
                ->where('atmn_recruitment.status', '=', "Approve")
                ->where('pastor_assign.status','=',null)
                ->where('atmn_recruitment.deleted_at', '=', Null)
                ->orwhere('pastor_assign.assign_start_date','>',$currentDate)
                ->orwhere('pastor_assign.assign_end_date','<',$currentDate)
                ->where('atmn_recruitment.district_id', '=', $district_id)
                ->get();
            $district_value = $district_name[0]->district ?? '';
        }
        if($isUSER=='admin'){
            $total_app_pending_count = count($adminappapppendinglist);
            $total_app_approve_count = count($adminappappapprovelist);
            $total_brief_pending_count = count($adminbriefpendinglist);
            $total_brief_approve_count = count($adminbriefapprovelist);
            $total_placed_count = count($placedData);
            $total_available_count = count($availableData);

            $user_status = "" ;
            $user_data = "" ;
        }
        if($isUSER=='ds'){
            $total_app_pending_count = count($dsapppendinglist);
            $total_app_approve_count = count($dsappapprovelist);
            $total_brief_pending_count = count($briefdspendinglist);
            $total_brief_approve_count = count($briefdsapprovelist);
            $total_placed_count = count($dsplacedData);
            $total_available_count = count($dsavailableData);
            $user_status = "" ;
            $user_data = "" ;
        }
        if($isUSER==''){
            $user_id = Auth::user()->id;
            $status = Atmn::select('status')->where('user_id', $user_id)->first();
            
            if(isset($status)){
                $user_status = Atmn::select('status','user_id')->where([[ 'status' , $status->status ?? null],['user_id', $user_id]])->get();
                $user_data = [
                    'status'=>$user_status[0]->status,
                    'user_id'=>$user_status[0]->user_id
                 ];
                
            }else{
                $user_data = [
                    'status'=>"",
                    'user_id'=>""
                 ];
            }
            
            $total_app_pending_count = '';
            $total_app_approve_count = '';
            $total_brief_pending_count = '';
            $total_brief_approve_count = '';
            $total_placed_count = '';
            $total_available_count = '';
        }
        $districtcount = district::all()->count();
        $ds= User::where('district_id','!=',Null)->where('district_id','!=','National Office')->get()->groupBy('district_id');
        $dsstaffcount = count($ds);
        
        // dd($dsplacedData,$dsavailableData);
 
        return view('frontend.app.dashboard',compact('data','total_app_pending_count','total_app_approve_count','total_brief_pending_count','total_brief_approve_count','total_placed_count','total_available_count','district_value','user_data','dsstaffcount','districtcount'));
      
    }

    /**
     * Show the form for creating a new resource
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $app_data = Atmn::where('user_id', $user_id)->first();

        if(isset($app_data)){
            $data = Atmn::where('user_id', $user_id)->first();
        }else{
            $data = "";
        }
        $district = district::all();
        $state = state::all();
        $user = Auth::user();

        return view('frontend.app.wizardapplication',compact('state','district','user','data'));
    }

     /**
     * Store a newly created resource in storage
     * @access public
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtmnRequest $request)
    { 
        $input = $request->all();

        $user_id = Auth::user()->id;
        $status = Atmn::select('user_id')->where('user_id', $user_id)->first();
        $atmn = new Atmn($input);
        $atmn->save();
    // dd($input);
    // $filedata = Atmn::upload_file($request->file('fields_1'));
    // $data['fields_1'] = $filedata['fileOriginalName'];
        $data = $atmn->mainkey;
        Session::flash('success', 'Pastor application send successfully');
         
        return view('frontend.app.profile');
      
    }

     /**
     * Display the specified resource based on requested slider
     * @access public
     * @param  int $id
     * @return json array data
     */
    public function show($id)
    {
        $id   = ATMNHelper::decryptUrl($id);
        $data = Atmn::where('mainkey', $id)->first();
        return view('frontend.app.application', compact('data'));
    }   

     /**
     * Show the form for editing the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $district = district::all();
        $user = Auth::user();
        $data = Atmn::where('id', $id)->first();

        return view('frontend.app.application1', compact('data','district', 'user'));
    }

     /**
     * Update the specified resource
     * @access public
     * @param  \Illuminate\Http\Request $request, int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtmnRequest $request, $id)
    {
        $input = $request->all();
        //dd($input);
        $atmn = Atmn::where('id', $id)->first();
        $data=$input;
        //For Deleting a File
        if(!empty($request->file('fields_1'))){
            $filedelete = $atmn->fields_1;
            if(\File::exists(public_path(trans('main.slider.fields_1up').$filedelete))){
              \File::delete(public_path(trans('main.slider.fields_1up').$filedelete));
            }
        }
        $filedata = Atmn::upload_file($request->file('fields_1'));
        if ($filedata) {
        $data['fields_1'] = $filedata['fileOriginalName'];
        }
        $atmn->update($data);
        
        $data = $atmn->mainkey;
        Session::flash('success', 'Pastor details updated successfully'); 
        return view('frontend.app.profile',compact('data'));
    }
    
     /**
     * Remove the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $id = ATMNHelper::decryptUrl($id);
        $atmn = Atmn::where('mainkey', $id)->first();
        $filedelete = $atmn['fields_1'];
        if(\File::exists(public_path(trans('main.slider.fields_1up').$filedelete))){
          \File::delete(public_path(trans('main.slider.fields_1up').$filedelete));
        }
        $atmn->delete();
        return redirect()->route('pastor.index')->with('success',trans('main.slider.deletesuccess'));
    }

    public function profile()
    { 
        $isUSER = ATMNHelper::isUSER();
        $user_id =  Auth::user()->id;
        $data = Atmn::where('user_id',$user_id)->first();
        $status = $data->status ?? Null;
        return view('frontend.app.profile',compact('data','status'));
      
    }

    public function userprofileview($id)
    { 
        $user_id = ATMNHelper::decryptUrl($id);
        $data = Atmn::where('user_id',$user_id)->first();
        $status = $data->status ?? Null;
        return view('frontend.admin.user-profiledata-view',compact('data','status','user_id'));
    }
    
    public function admindashboard()
    {
        $district = district::all();
            
        $district_detail = [];

        foreach($district as $dist){

            $pendinglist = Atmn::select('district_id','first_name','id')->where([['district_id', $dist->id],[ 'status' , 'Pending']])->get();
            $approvelist = Atmn::select('district_id','first_name','id')->where([['district_id', $dist->id],[ 'status' , 'Approve']])->get();

            $districtname = $dist->district;
            $district_id = $dist->id;

            $cntAppPend = count($pendinglist);
            $cntAppApprove = count($approvelist);
            
            array_push($district_detail, [ 'district_name'=>$districtname ,'district_id'=>$district_id , 'pending'=>$cntAppPend , 'approve' => $cntAppApprove]);

        }
        return view('frontend.admin.dashboard',compact('district_detail','district'));

    }

    public function adminplaceddashboard()
    {
        $district = district::all();
        $currentDate = Carbon\Carbon::now()->toDateString();
        $district_detail = [];

        foreach($district as $dist){

            $placedData = DB::table('atmn_recruitment')->select()
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.status', '=', 'Approve')
            ->where('pastor_assign.status','=','placed')
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->where('atmn_recruitment.district_id', '=', $dist->id)
            ->where('pastor_assign.assign_start_date','<=',$currentDate)
            ->where('pastor_assign.assign_end_date','>=',$currentDate)
            ->get();

            $availableData = DB::table('atmn_recruitment')->select()
            ->select('atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.district_id', '=', $dist->id)
            ->where('atmn_recruitment.status', '=', "Approve")
            ->where('pastor_assign.status','=',null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->orwhere('pastor_assign.assign_start_date','>',$currentDate)
            ->where('atmn_recruitment.district_id', '=', $dist->id)
            ->orwhere('pastor_assign.assign_end_date','<',$currentDate)
            ->where('atmn_recruitment.district_id', '=', $dist->id)
            ->get();
            
            $districtname = $dist->district;
            $district_id = $dist->id;

            $cntPlacedCount = count($placedData);
            $cntAvailableCount = count($availableData);
            
            array_push($district_detail, [ 'district_name'=>$districtname ,'district_id'=>$district_id , 'placed'=>$cntPlacedCount , 'available' => $cntAvailableCount]);

        }
        return view('frontend.admin.availabledashboard',compact('district_detail','district'));

    }

    public function districtavailablitylist($id)
    {
        $district_id = ATMNHelper::decryptUrl($id);
        $district_name = district::select('district')->where('d_id',$district_id)->get();
        $district_value = $district_name[0]->district ?? null;
        $currentDate = Carbon\Carbon::now()->toDateString();
        
        $placedData = DB::table('atmn_recruitment')
            ->select('atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->where('atmn_recruitment.status','=',"Approve")
            ->where('pastor_assign.status','=',"Placed")
            ->where('atmn_recruitment.district_id','=',$district_id)
            ->where('pastor_assign.assign_end_date','>=',$currentDate)
            ->where('pastor_assign.assign_start_date','<=',$currentDate)
            ->get();
        
        $availableData = DB::table('atmn_recruitment')
            ->select('atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.district_id', '=', $district_id)
            ->where('atmn_recruitment.status', '=', "Approve")
            ->where('pastor_assign.status','=',null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->orwhere('pastor_assign.assign_start_date','>', $currentDate)
            ->where('atmn_recruitment.district_id','=', $district_id)
            ->orwhere('pastor_assign.assign_end_date','<', $currentDate)
            ->where('atmn_recruitment.district_id','=', $district_id)
            ->get();

        return view('frontend.admin.available',compact('placedData','availableData','district_value'));
    }

    public function admindistrictview($id)
    {
        $district_id = ATMNHelper::decryptUrl($id);
        $district_name = district::select('district')->where('d_id',$district_id)->get();
        $district_value = $district_name[0]->district ?? null;

        $atmn_recruitment_dspending = Atmn::where([['district_id', $district_id],['status' , 'Pending']])->get();
        $atmn_recruitment_dsapprove = Atmn::where([['district_id',$district_id],[ 'status' , 'Approve']])->get();

        $district_app_pendinglist = [];
        $district_app_approvelist = [];

        foreach($atmn_recruitment_dspending as $atmn_pending){
            $id = $atmn_pending->id;
            $pastor_name = $atmn_pending->first_name;
            $title = $atmn_pending->title;
            $last_name = $atmn_pending->last_name;
            $pastor_mainkey = $atmn_pending->mainkey;
            $created_at = $atmn_pending->created_at;
            $cntAppPend = count($atmn_recruitment_dspending);
            $cntAppApprove = count($atmn_recruitment_dsapprove);
            array_push($district_app_pendinglist, ['id'=>$id, 'first_name'=>$pastor_name,'title'=>$title ,'last_name'=>$last_name  ,'mainkey'=>$pastor_mainkey , 'pending'=>$cntAppPend , 'approve' => $cntAppApprove ,'created_at' => $created_at ,]);
        }

        foreach($atmn_recruitment_dsapprove as $atmn_approve){
            $id = $atmn_approve->id;
            $pastor_name = $atmn_approve->first_name;
            $title = $atmn_approve->title;
            $last_name = $atmn_approve->last_name;
            $approve_date = $atmn_approve->approved_date;
            $pastor_mainkey = $atmn_approve->mainkey;
            $cntAppPend = count($atmn_recruitment_dspending);
            $cntAppApprove = count($atmn_recruitment_dsapprove);
            array_push($district_app_approvelist, ['id'=>$id, 'first_name'=>$pastor_name,'title'=>$title ,'last_name'=>$last_name ,'mainkey'=>$pastor_mainkey , 'pending'=>$cntAppPend , 'approve' => $cntAppApprove ,'approved_date' => $approve_date ]);
        }

        return view('frontend.admin.districtview',compact('district_app_approvelist','district_app_pendinglist','district_value'));
    }

    public function dsdashboard(){

        $district_id =  Auth::user()->district_id ?? null;

        $district_name = district::select('district')->where('d_id',$district_id)->get();

        $district_value = $district_name[0]->district ?? null;

        $atmn_recruitment_dspending = Atmn::where([['district_id', $district_id],['status' , 'Pending']])->get();
        $atmn_recruitment_dsapprove = Atmn::where([['district_id',$district_id],[ 'status' , 'Approve']])->get();

        $district_app_pendinglist = [];
        $district_app_approvelist = [];

        foreach($atmn_recruitment_dspending as $atmn_pending){
            $id = $atmn_pending->id;
            $pastor_name = $atmn_pending->first_name;
            $title = $atmn_pending->title;
            $last_name = $atmn_pending->last_name;
            $pastor_mainkey = $atmn_pending->mainkey;
            $created_at = $atmn_pending->created_at;
            $cntAppPend = count($atmn_recruitment_dspending);
            $cntAppApprove = count($atmn_recruitment_dsapprove);
            array_push($district_app_pendinglist, ['id'=>$id, 'first_name'=>$pastor_name,'title'=>$title ,'last_name'=>$last_name ,'mainkey'=>$pastor_mainkey , 'pending'=>$cntAppPend , 'approve' => $cntAppApprove ,'created_at' => $created_at ,]);
        }

        foreach($atmn_recruitment_dsapprove as $atmn_approve){
            $id = $atmn_approve->id;
            $pastor_name = $atmn_approve->first_name;
            $title = $atmn_approve->title;
            $last_name = $atmn_approve->last_name;
            $approve_date = $atmn_approve->approved_date;
            $pastor_mainkey = $atmn_approve->mainkey;
            $cntAppPend = count($atmn_recruitment_dspending);
            $cntAppApprove = count($atmn_recruitment_dsapprove);
            array_push($district_app_approvelist, ['id'=>$id, 'first_name'=>$pastor_name,'title'=>$title ,'last_name'=>$last_name,'mainkey'=>$pastor_mainkey , 'pending'=>$cntAppPend , 'approve' => $cntAppApprove ,'approved_date' => $approve_date ]);
        }

        return view('frontend.ds.dashboard',compact('district_app_approvelist','district_app_pendinglist','district_value'));
    }

    public function dsplacedlist(){

        $district_id =  Auth::user()->district_id ?? null;

        $district_name = district::select('district')->where('d_id',$district_id)->get();

        $district_value = $district_name[0]->district ?? null;

        $currentDate = Carbon\Carbon::now()->toDateString();

        $availableData = DB::table('atmn_recruitment')
            ->select('atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->where('atmn_recruitment.status','=',"Approve")
            ->where('pastor_assign.status','=',"Placed")
            ->where('atmn_recruitment.district_id','=',$district_id)
            ->where('pastor_assign.assign_end_date','>=',$currentDate)
            ->where('pastor_assign.assign_start_date','<=',$currentDate)
            ->get();

        return view('frontend.ds.available',compact('availableData','district_value'));
    }

    public function dsavailablelist(){

        $district_id =  Auth::user()->district_id ?? null;

        $district_name = district::select('district')->where('d_id',$district_id)->get();

        $district_value = $district_name[0]->district ?? null;

        $currentDate = Carbon\Carbon::now()->toDateString();

        $availableData = DB::table('atmn_recruitment')
            ->select('atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','atmn_recruitment.user_id','=','users.id')
            ->where('users.user_type','=',Null)
            ->where('atmn_recruitment.district_id', '=', $district_id)
            ->where('atmn_recruitment.status', '=', "Approve")
            ->where('pastor_assign.status','=',null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->orwhere('pastor_assign.assign_start_date','>', $currentDate)
            ->orwhere('pastor_assign.assign_end_date','<', $currentDate)
            ->where('atmn_recruitment.district_id','=', $district_id)
            ->get();

        return view('frontend.ds.available',compact('availableData','district_value'));
    }

    public function StepOne(AtmnRequest $request)
    {   
        $user_id = Auth::user()->id;
        $app_data = Atmn::where('user_id', $user_id)->first();

        if(isset($app_data)){
            $data = Atmn::where('user_id', $user_id)->first();
            $pastor_assign = pastorassign::where('pastor_id', $user_id)->first();
        }else{
            $data = "";
            $pastor_assign = "";
        }

        $district = district::all();
        $locations = locationsdata::all();
        $countries = countries::all();
        $ministry_type = ministry_type::all();
        $peacemaking = peacemaking::all();
        $files = attachments::where('user_id',$user_id)->get();
        $file_data  = $files[0] ?? '';

        $state = state::all();
        $comfortable_serving_church = comfortable_serving_church::all();
        $ministry_area = ministry_area::all();
        $prefer_serve_church = prefer_serve_church::all();
        $unavailabeData = UnAvailable::all();
        $pastorassignHistory = assignstatushistory::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        $status_history_data = status_history::where('user_id', $user_id)->get();
        $status_history_count = count($status_history_data);
        $commentsData = applicationcomments::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        
        if($status_history_count == 0){
            $status_history_input = ([
            'status' => 'Not Started',
            'date' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' =>  $user_id
            ]);
            $status_history = new status_history($status_history_input);
            $status_history->save();
        }

        if($pastor_assign != ""){
           $ds_name = user::where('id',$pastor_assign->assigned_by)->first();
        }else{
            $ds_name = "";
        }
  
        return view('frontend.app.wizardapplication',compact('district','state','countries','data','file_data','user_id','unavailabeData','comfortable_serving_church','ministry_area','ministry_type','prefer_serve_church','pastor_assign','ds_name','status_history_data','peacemaking','pastorassignHistory','commentsData'));
    }
  
    public function postStepOne(Request $request)
    {
        
        $val=$request->all();
        $street1 = $request->input('street1');
        $street2 = $request->input('street2');
        $city = $request->input('city');
        $state = $request->state;
        $country = $request->input('country');
        $zip = $request->input('zip');
        $address_fields = array($street1,$street2,$city,$state,$country,$zip);
        $home_address = implode(",",$address_fields);
        $request->merge([
        'home_address' => $home_address
        ]);
        $input =$request->all();
        
        $user_type = Auth::user()->user_type;
        if($user_type == ''){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $request->user_id;
        }
        $atmn_data = Atmn::select('user_id')->where('user_id', $user_id)->get();
        $atmn_data_count = count($atmn_data);

        $attachments_data = attachments::where('user_id', $user_id)->get();
        $attachments_data_count = count($attachments_data);

        $status_history_data = status_history::where('user_id', $user_id)->get();
        $status_history_count = count($status_history_data);

        if($attachments_data_count == '0'){
            $attachment = ['user_id' => $user_id];
            $attachments = new attachments($attachment);
            $attachments->save();
            $attachmentsdata = attachments::where('user_id', $user_id)->first();
        }

        if($status_history_count == 1){
            $status_history_inputstatus_history_input = ([
                'status' => 'Started',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $user_id
            ]);
            $status_history = new status_history($status_history_inputstatus_history_input);
            $status_history->save();
            $status_historysdata = status_history::where('user_id', $user_id)->get();
        }

        if($atmn_data_count == '0'){
            $status = Atmn::select('user_id')->where('user_id', $user_id)->first();
            $atmn = new Atmn($input);
            $atmn->save();
            $atmn_data = Atmn::where('user_id', $user_id)->first();
        }else{
            $atmn = Atmn::where('user_id', $user_id)->first();
            $atmn->update($input);
            $atmn_data = Atmn::where('user_id', $user_id)->first();
        }

       return response()->json(['success'=> 'storestep2']);
    }
  
    public function postStepTwo(Request $request)
    { 

        if ($request->language == null) {
            $request->merge(['language' => 'N']);
        }

        $input = $request->all();
        $user_type = Auth::user()->user_type;
        if($user_type == ''){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $request->user_id;
        }

        $atmn = Atmn::where('user_id', $user_id)->first();
        $atmn->update($input);
        $data = $atmn->mainkey;
        return response()->json(['success'=>'storestep3']); 
    }

 
    public function postStepThree(Request $request)
    {

        if ($request->interim_pastor_ministries == null) {
            $request->merge(['interim_pastor_ministries' => 'N']);
        }

        if ($request->vital_church_ministries == null) {
            $request->merge(['vital_church_ministries' => 'N']);
        }

        $input = $request->all();

        $user_type = Auth::user()->user_type;
        if($user_type == ''){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $request->user_id;
        }
        
        $atmn = Atmn::where('user_id', $user_id)->first();
        $email = $atmn->email;
        $sent_email = $request->send_email;
        $status_history_data = status_history::where('user_id', $user_id)->get();
        $status_history_count = count($status_history_data);

        if($status_history_count == 2){
            $status_history_input = ([
                'status' => 'Submitted',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $user_id
            ]);
            $status_history = new status_history($status_history_input);
            $status_history->save();
            $status_historysdata = status_history::where('user_id', $user_id)->get();
        }

        // if($atmn->send_email == 'N' && $sent_email == 'Y'){
        //     $bodyContent = [
        //                     'toName' => Auth::user()->name,
        //                 ];
        //     try {
        //         \Mail::to($email)->send(new \App\Mail\PastorApplicationSubmitted($bodyContent));
        //     } catch (\Exception $e) {
        //     }
        // }
        $atmn->update($input);

        return response()->json(['success'=>'storestep4']);
    }

    public function pageUploadFile(Request $request ,$userid){
        $user_id = ATMNHelper::decryptUrl($userid);
        $input = $request->all();
        foreach($input as $key => $value){
            $file = $key;
            $filename = $value->getClientOriginalName();
            $attachment = [$file => $filename];
            $attachnments = attachments::where('user_id',$user_id)->update($attachment);
            $attach = attachments::where('user_id',$user_id)->get();
        }
        $data = array();
        $filename = $file == 'resume' ? 'required|mimes:pdf,doc,docx' : 'required|mimes:pdf';
        $validator = Validator::make($request->all(), [
                $file => $filename,  
            ]);
        if ($validator->fails($file)) {
            //$data['success'] = 0;
            $data['file_id'] = $file;
            $data['error'] = $validator->errors()->first($file);// Error response
        }else{
            if($request->file(''.$file.'')) {
                $file = $request->file(''.$file.'');
                $filename = $file->getClientOriginalName();
                // File extension
                $extension = $file->getClientOriginalExtension();
                // File upload location
                $location = 'uploads/'.$user_id.'/';
                if($location){
                    $file->move($location,$filename);
                }
                $filepath = url('uploads/'.$user_id.'/'.$filename);
                // Upload file
                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
            }else{
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.'; 
            }
        }

      return response()->json($data);
    }

    public function pastorstatushistory()
    {
        $user_id = Auth::user()->id;
        $atmn = Atmn::where('user_id', $user_id)->first();
        $status_history = status_history::where('user_id', $user_id)->get();
        $unavailabledata = UnAvailable::where('user_id',$user_id)->get();
        $unavailabledatacount = count($unavailabledata);
        return view('frontend.app.status-history', compact('status_history','atmn','unavailabledatacount'));
    }


    public function statushistory(Request $request ,$id)
    {
        $user_id = ATMNHelper::decryptUrl($id);
        // $atmn = status_history::where('user_id', $user_id)->get();

        if ($request->ajax()) {
            $data = status_history::where('user_id', $user_id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '';
                        $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="myBtnshow" id="myBtnshow'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-eye"></i></a>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
    }


    public function viewAvailablity(Request $request ,$id)
    {

        $user_id = ATMNHelper::decryptUrl($id);

        $atmn = Atmn::where('user_id', $user_id)->first();

        if(empty($atmn)){
            $statusVal = '';
        }else{
            $statusVal = $atmn->status;
        }

        if(Auth::user()->user_type == '' ?? null){
            if ($request->ajax()) {
            $data = UnAvailable::orderBy('id','DESC')->where('user_id', $user_id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '';
                        $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="myBtnshow" id="myBtnshow'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-eye"></i></a>';
                        if(Auth::user()->user_type ==''){
                            $btn =  $btn.'  <a href="javascript:void(0)" data-toggle="tooltip" class="myBtnedit" id="myBtnedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="edit"><i class="fa fa-edit"></i></a>';
                            $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="myBtndel"  id="myBtndel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

        }else{
            if ($request->ajax()) {
            $data = UnAvailable::latest()->where('user_id', $user_id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '';
                        $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="myBtnshow" id="myBtnshow'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-eye"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        } 
        }
        
    }

    public function Pastorviewavailability()
    {
        $user_id = Auth::user()->id;
        $atmn = Atmn::where('user_id', $user_id)->first();
        $UnAvailable = UnAvailable::where('user_id', $user_id)->get();
        return view('frontend.app.pastoravailablity',compact('UnAvailable','atmn'));
    }

    public function postAvaliability(Request $request)
    {    
        $user_id = Auth::user()->id;
        $request->merge([
        'user_id' => $user_id
        ]);
        $input = $request->all();
        $unavailable = new UnAvailable($input);
        $unavailable->save();

        $unavailabeData = UnAvailable::all();
        $dataCount= count( $unavailabeData);

        // dd($unavailabeData);
        return response()->json(['success'=> 'addAvailability','data'=> $unavailabeData,'data_count'=> $dataCount]);
    }
    
    public function viewDataAvaliability(Request $request)
    {
        $reqId = $request->all();
        $unavailabeData = UnAvailable::where('id',$reqId)->get();
        $unavailabeDataVal = $unavailabeData[0];
        return response()->json(['unavailabeData'=> $unavailabeDataVal]);
    }
    public function updateAvailability(Request $request)
    {
        $input = $request->all();
        $reqId = $request->id;
        $unavailabeData = UnAvailable::where('id',$reqId)->update($input);

        return response()->json(['success'=> 'Updated Successfully']);
    }

    public function destroyAvaliability(Request $request)
    {
        $reqId = $request->id;
        $unavailabeData = UnAvailable::find($reqId);
        $unavailabeData->delete();
        return response()->json(['unavailabeData' => 'delete success']);
    }

    public function dsshow($id)
    { 
        $id = ATMNHelper::decryptUrl($id);
        $district = district::all();
        $state = state::all();
        $countries = countries::all();
        $peacemaking = peacemaking::all();
        $comfortable_serving_church = comfortable_serving_church::all();
        $ministry_area = ministry_area::all();
        $ministry_type = ministry_type::all();
        $prefer_serve_church = prefer_serve_church::all();
        $unavailabeData = UnAvailable::all();
        $user = Auth::user();
        $data = Atmn::where('id', $id)->first();
        $user_id = $data->user_id;
        $files = attachments::where('user_id',$user_id)->get();
        $file_data  = $files[0] ?? '';
        $pastor_assign = pastorassign::where('pastor_id', $user_id)->first();
        $pastorassignHistory = assignstatushistory::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        $commentsData = applicationcomments::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        if($pastor_assign != ""){
            $ds_name = user::where('id',$pastor_assign->assigned_by)->first();
        }else{
             $ds_name = "";
        }
        return view('frontend.ds.ds-application-show', compact('data','file_data','state','district','countries','ministry_type','user','unavailabeData','comfortable_serving_church','ministry_area','prefer_serve_church','pastor_assign','ds_name','peacemaking','pastorassignHistory','commentsData'));
    }

    public function adminshow($id)
    { 
        $id = ATMNHelper::decryptUrl($id);
        $district = district::all();
        $state = state::all();
        $countries = countries::all();
        $comfortable_serving_church = comfortable_serving_church::all();
        $ministry_area = ministry_area::all();
        $ministry_type = ministry_type::all();
        $prefer_serve_church = prefer_serve_church::all();
        $unavailabeData = UnAvailable::all();
        $peacemaking = peacemaking::all();
        $user = Auth::user();
        $data = Atmn::where('id', $id)->first();
        $user_id = $data->user_id;
        $files = attachments::where('user_id',$user_id)->get();
        $file_data  = $files[0] ?? '';
        $pastor_assign = pastorassign::where('pastor_id', $user_id)->first();
        $pastorassignHistory = assignstatushistory::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        $commentsData = applicationcomments::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        if($pastor_assign != ""){
            $ds_name = user::where('id',$pastor_assign->assigned_by)->first();
        }else{
             $ds_name = "";
        }
        
        return view('frontend.admin.admin-application-show', compact('data','file_data','state','district','countries','user','unavailabeData','comfortable_serving_church','ministry_area','ministry_type','prefer_serve_church','pastor_assign','ds_name','peacemaking','pastorassignHistory','commentsData'));
    }

    public function adminshowuserlist($id)
    { 
        $id = ATMNHelper::decryptUrl($id);
        $district = district::all();
        $state = state::all();
        $countries = countries::all();
        $comfortable_serving_church = comfortable_serving_church::all();
        $ministry_area = ministry_area::all();
        $ministry_type = ministry_type::all();
        $prefer_serve_church = prefer_serve_church::all();
        $unavailabeData = UnAvailable::all();
        $peacemaking = peacemaking::all();
        $user = Auth::user();
        $data = Atmn::where('user_id', $id)->first();
        $user_id = $data->user_id;
        $files = attachments::where('user_id',$user_id)->get();
        $file_data  = $files[0] ?? '';
        $pastor_assign = pastorassign::where('pastor_id', $user_id)->first();
        $pastorassignHistory = assignstatushistory::orderBy('id','DESC')->where('pastor_id', $user_id)->get();
        $commentsData = applicationcomments::orderBy('id','DESC')->where('pastor_id', $user_id)->get();

        if($pastor_assign != ""){
            $ds_name = user::where('id',$pastor_assign->assigned_by)->first();
        }else{
             $ds_name = "";
        }
        return view('frontend.admin.admin-application-show-user', compact('data','file_data','state','district','countries','user','unavailabeData','comfortable_serving_church','ministry_area','ministry_type','prefer_serve_church','pastor_assign','ds_name','peacemaking','pastorassignHistory','commentsData'));
    }

    public function adminedit($id)
    { 
        $id = ATMNHelper::decryptUrl($id);
        $district = district::all();
        $state = state::all();
        $countries = countries::all();
        $comfortable_serving_church = comfortable_serving_church::all();
        $ministry_area = ministry_area::all();
        $ministry_type = ministry_type::all();
        $peacemaking = peacemaking::all();
        $prefer_serve_church = prefer_serve_church::all();
        $unavailabeData = UnAvailable::all();
        $user = Auth::user();
        $data = Atmn::where('id', $id)->first();
        $user_id = $data->user_id;
        $files = attachments::where('user_id',$user_id)->get();
        $file_data  = $files[0] ?? '';
        return view('frontend.admin.admin-application-edit', compact('data','file_data','state','countries','district', 'user','unavailabeData','comfortable_serving_church','ministry_area','ministry_type','prefer_serve_church','peacemaking'));
    }

    public function adminupdate(Request $request, $id)
    {   
        $id = ATMNHelper::decryptUrl($id);
        $approver_name = Auth::user()->username;
        $submit_status = $request->submit_status;
        $atmn = Atmn::where('id', $id)->first();
        $status_history_data = status_history::where('user_id', $atmn->user_id)->get();
        if($submit_status == "Approve"){
            $request->merge([
                'status' => "Approve",
                'approved_by' => $approver_name,
                'approved_date' => Carbon\Carbon::now()->toDateTimeString() 
            ]);
            $status_history_input = ([
                'status' => 'Approved',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $atmn->user_id

            ]);
            $status_history = new status_history($status_history_input);
            $status_history->save();

            // $bodyContent = [
            //                 'toFirstName' => $atmn->first_name,
            //                 'toLastName'   => $atmn->last_name
            //             ];
            // try {
            //     \Mail::to($email)->send(new \App\Mail\PastorApplicationApproved($bodyContent));
            //     } 
            //     catch (\Exception $e) {
            // }
        }
        if($submit_status == "Pending"){
            $status_history_input = ([
                'status' => 'Pending',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $atmn->user_id
            ]);
            $status_history = new status_history($status_history_input);
            $status_history->save();

            // $bodyContent = [
            //                 'toFirstName' => $atmn->first_name,
            //                 'toLastName'   => $atmn->last_name
            //             ];
            // try {
            //     \Mail::to($email)->send(new \App\Mail\PastorApplicationApproved($bodyContent));
            //     } 
            //     catch (\Exception $e) {
            // }

        }
        if($submit_status == "Awaiting"){
            $status_history_input = ([
                'status' => 'Awaiting',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $atmn->user_id
            ]);
            $status_history = new status_history($status_history_input);
            $status_history->save();

            // $bodyContent = [
            //                 'toFirstName' => $atmn->first_name,
            //                 'toLastName'   => $atmn->last_name
            //             ];
            // try {
            //     \Mail::to($email)->send(new \App\Mail\PastorApplicationAwaiting($bodyContent));
            //     } 
            //     catch (\Exception $e) {
            // }
        }
        if($submit_status == "Declined"){

            $status_history_input = ([
                'status' => 'Declined',
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' =>  $atmn->user_id
            ]);

            $status_history = new status_history($status_history_input);
            $status_history->save();

            // $bodyContent = [
            //                 'toFirstName' => $atmn->first_name,
            //                 'toLastName'   => $atmn->last_name
            //             ];
            // try {
            //     \Mail::to($email)->send(new \App\Mail\PastorApplicationDeclined($bodyContent));
            //     } 
            //     catch (\Exception $e) {
            // }

        }
        $getdata = status_history::where('user_id',$atmn->user_id)->get();
        $email = $atmn->email;
        if($request->submit_status == "Approve"){
            $request->merge([
                'status' => "Approve"
            ]);
        }else{
            $request->merge([
                'status' => "Pending"
            ]);
        }
        $input = $request->all();


        $inputcomment = [
                'comment' => $request->comments,
                'pastor_id' => $atmn->user_id,
                'submitted_by' => Auth::user()->id
            ];
            
        $applicationcomments = new applicationcomments($inputcomment);
        $applicationcomments ->save();

        $atmn->update($input);

        return response()->json(['success'=>"success"]); 
    }

    public function getlocations(Request $request)
    {
        $field = $request['field'];
        $address_data = $request['address_data'];
        if($field == 'country'){
            $stateVal = locationsdata::where('country_abbr',$address_data)->orderBy('state')->get()->groupBy('state');
            $state = [];
            foreach($stateVal as $states){
               $state[] = $states;            
            }
            $stateData = array_values($state);
            $cityData = '';
            $zipData = '';
        }
        return response()->json(['success'=>$field,'state'=>$stateData]); 
    }

    public function getgeocode(Request $request)
    {
        $queryString = http_build_query([
          'access_key' => 'df0a46111d07efda9515b6cd608b8caf',
          'query' => $request->address,
          'output' => 'json',
          'limit' => 1,
        ]);
        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $apiResult = json_decode($json, true);
        $apiResultdata = $apiResult['data'] ?? '';
        $geocode = $apiResultdata[0];
        return response()->json(['geocode'=>$geocode]); 
    }

}
