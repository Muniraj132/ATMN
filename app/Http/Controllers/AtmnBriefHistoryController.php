<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Atmn Controller Class
 * Provides functionality for maintainining the slider detail for Frontend
 *
 * @Package             Controllers
 * @Author              Cyril P
 * @Created On          17-05-2018
 * @Modified            Cyril P
 * @Modified On         17-05-2018
 * @Reviewed            Loganathan N
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AtmnBriefHistoryRequest;
use App\Http\Controllers\Controller;
use App\Helpers\ATMNHelper;
use App\Models\Atmn;
use App\Models\user;
use App\Models\UnAvailable;
use App\Models\peacemaking;
use App\Models\AtmnBriefHistory;
use App\Models\pastorassign;
use App\Models\district;
use App\Middleware\Pastor;
use Illuminate\Http\Request;
use Redirect;
use Session;
use File;

class AtmnBriefHistoryController extends Controller
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
        $user_id = Auth::user()->id;
        $data = AtmnBriefHistory::where('user_id',$user_id)->get();
        $AtmnBrief = AtmnBriefHistory::where('user_id',$user_id)->first();
        $status = '';
        $monthyear = \Carbon\Carbon::today()->format('Y-m');
        if(isset($AtmnBrief)){
            $AtmnBriefHistory = AtmnBriefHistory::select('created_at')->where('user_id',$user_id)->first();
            $monthyearval = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$AtmnBriefHistory->created_at)->format('Y-m');
            $addBrief = $monthyearval == $monthyear ? 'show' : '' ;
        }else{
            $addBrief = '';
        }

        
        return view('frontend.brief.index',compact('data','status','addBrief'));
    }

    /**
     * Show the form for creating a new resource
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = district::all();
        $user_id = Auth::user()->id;
        $status = '';
        $atmnData = Atmn::where('user_id', $user_id)->first();
        $briefData = '';
        return view('frontend.brief.application' ,compact('atmnData','district','status','briefData'));
    }

     /**
     * Store a newly created resource in storage
     * @access public
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtmnBriefHistoryRequest $request)
    {   
		$input = $request->all();
        $user_id = Auth::user()->id;
        $brief_history_data = AtmnBriefHistory::where('user_id', $user_id)->latest('created_at')->first();
        $monthyear = \Carbon\Carbon::today()->format('Y-m');
        if($brief_history_data != null){
            $monthyearval = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$brief_history_data->created_at)->format('Y-m');
        }else{
            $monthyearval = "";
        }

        
        $addBrief = $monthyearval == $monthyear ? 'out' : 'in' ;

        // if($addBrief == "in"){
        //     $bodyContent = [
        //                     'toFirstName' => $atmn->first_name,
        //                     'toLastName'   => $atmn->last_name,
        //                     'toMonthYear'   => $monthyear
        //                 ];
        //     dd($bodyContent);
        //     try {
        //         \Mail::to($email)->send(new \App\Mail\PastorApplicationApproved($bodyContent));
        //         } 
        //         catch (\Exception $e) {
        //     }
        // }

        $brief_history = new AtmnBriefHistory($input);
        $brief_history->save();
        return redirect()->route('brief.index')->with('success','Briefing details added successfully');
    }

     /**
     * Display the specified resource based on requested slider
     * @access public
     * @param  int $id
     * @return json array data
     */
    public function show($id)
    {  
        $user_id = Auth::user()->id;
        $district = district::all();
        $status = '';
        $id   = ATMNHelper::decryptUrl($id);
        $data = AtmnBriefHistory::where('id', $id)->first();
        $atmnData = Atmn::where('user_id', $user_id)->first();
        return view('frontend.brief.application', compact('data','district','status','atmnData'));
    }	

     /**
     * Show the form for editing the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $district = district::all();
        $id = ATMNHelper::decryptUrl($id);
        $status = '';
        $data = AtmnBriefHistory::where('id', $id)->first();
        $atmnData = Atmn::where('user_id', $user_id)->first();
      return view('frontend.brief.application', compact('data','atmnData','district','status'));
    }

    public function dsshow($id)
    {  
        $district = district::all();
        $status = '';
        $id   = ATMNHelper::decryptUrl($id);
        $data = AtmnBriefHistory::where('id', $id)->first();
        $atmnData = Atmn::where('user_id', $data->user_id)->first();

        return view('frontend.brief.ds.brief-application-show', compact('data','district','status','atmnData'));
    }   

    public function adminshow($id)
    {  
        $district = district::all();
        $status = '';
        $id   = ATMNHelper::decryptUrl($id);
        $data = AtmnBriefHistory::where('id', $id)->first();
        $atmnData = Atmn::where('user_id', $data->user_id)->first();

        return view('frontend.brief.admin.brief-application-show', compact('data','district','status','atmnData'));
    } 

     /**
     * Show the form for editing the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function dsedit($id)
    {
        $user_id = Auth::user()->id;
        $district = district::all();
        $id = ATMNHelper::decryptUrl($id);
        $status = '';
        $data = AtmnBriefHistory::where('id', $id)->first();
        $atmnData = Atmn::where('user_id', $user_id)->first();
      return view('frontend.brief.ds.brief-application-edit', compact('data','atmnData','district','status'));
    }

    public function dsupdate(Request $request,$id)
    {
        $input = ([
            'brief_status' => $request->brief_status,
            'approver_id' => $request->approver_id,
            'ds_comments' => $request->ds_comments,
            'ds_approved_date' => $request->ds_approved_date,
            ]);
        $district = district::all();
        $id = ATMNHelper::decryptUrl($id);
        $data = AtmnBriefHistory::where('id', $id)->first();
        $data->update($input);
        $dist = Auth::user()->district_id;
        Session::flash('success', 'Briefing Details Approved Successfully');
        if($request->brief_status == "Pending"){
            return redirect()->route('briefdspendinglist');
        }else{
            return redirect()->route('briefdsapprovedlist');
        }
    }

     /**
     * Update the specified resource
     * @access public
     * @param  \Illuminate\Http\Request $request, int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtmnBriefHistoryRequest $request, $id)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;
        $id = ATMNHelper::decryptUrl($id);
        $brief_history = AtmnBriefHistory::where('id', $id)->first();
        $brief_history->update($input);
        $data = AtmnBriefHistory::all();
        Session::flash('success', 'Briefing details updated successfully'); 
        return redirect()->route('brief.index');
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
        $brief_history = AtmnBriefHistory::where('id', $id)->first();
        $brief_history->delete();
		return redirect()->route('brief.index')->with('success',trans('main.slider.deletesuccess'));
    }

    public function briefpendinglist()
    { 
        $dist = Auth::user()->district_id;
        $pending_brief_history = AtmnBriefHistory::where([['brief_status','Pending'],['d_id', $dist]])->get();
        return view('frontend.brief.ds.brief-pending-list', compact('pending_brief_history'));
    }

    public function briefapprovedlist()
    { 
        $dist = Auth::user()->district_id;
        $approved_brief_history = AtmnBriefHistory::where([['brief_status','Approved'],['d_id', $dist]])->get();
        return view('frontend.brief.ds.brief-approved-list', compact('approved_brief_history'));
    }

    public function briefpendinglistadmin()
    { 
        $pending_brief_history = AtmnBriefHistory::where('brief_status','Pending')->get();
        return view('frontend.brief.admin.brief-pending-list', compact('pending_brief_history'));
    }

    public function briefapprovedlistadmin()
    { 
        $approved_brief_history = AtmnBriefHistory::where('brief_status','Approved')->get();
        return view('frontend.brief.admin.brief-approved-list', compact('approved_brief_history'));
    }

}
