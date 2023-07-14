<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\resourcefiles;
use App\Models\countries;
use App\Models\state;
use App\Models\district;
use App\Models\Atmn;
use Auth;
use App\Models\UnAvailable;
use App\Models\pastorassign;
use App\Models\peacemaking;
use App\Models\ministry_area;
use App\Models\comfortable_serving_church;
use Yajra\DataTables\DataTables;
use App\Helpers\ATMNHelper;
use Carbon;
use DB;

class CandidateSearchController extends Controller {

    public function searchindex(){
        
        $countries = countries::all();
        $district = district::all();
        $state = state::all();
        $state = state::all();
        $peacemaking = peacemaking::all();
        $ministry_area = ministry_area::all();
        $serve_church = comfortable_serving_church::all();
        return view('frontend.search.searchindex',compact('countries','state','ministry_area','district','serve_church','peacemaking'));
    }

    public function getpasteraddress()
    { 
        $atmndata = Atmn::all();
        $data = $atmndata;
        $atmnLatlon = [];
        foreach($data as $homeLatlon => $val){
            $atmnLatlon[] = $val;
        }
        $atmnData = array_values($atmnLatlon);
        return response()->json(['data' => $atmnData]);
    }

    public function findpastor(Request $request)
    {   
        $id = $request->id;
        $miledata = $request->getdata;
        $searchministryarea = $request->ministry_area;

        switch( $searchministryarea ) {
        case $searchministryarea == 'within 100 miles of my residence': $miles = '100'; break;
        case $searchministryarea == 'within 500 miles of my residence': $miles = '500'; break;
        case $searchministryarea =='nationally': $miles = '1000'; break;
        case $searchministryarea == 'internationally': $miles = '1000+'; break;
        }


        if($miles == '100'){
            $dataarea = $miledata < $miles;
            if($dataarea == true){
                $atmnData = Atmn::where('id',$id)->get();

            }else{
                $atmnData = '';
            }
        }
        if($miles == '500'){
            $dataarea = $miledata < $miles;
            if($dataarea == true){
                $atmnData = Atmn::where('id',$id)->get();
            }else{
                $atmnData = '';
            }
        }
        if($miles == '1000'){
            $dataarea = $miledata < $miles;
            if($dataarea == true){
                $atmnData = Atmn::where('id',$id)->get();
            }else{
                $atmnData = '';
            }
        }
        if($miles == '1000+'){
            $atmnData = Atmn::where('id',$id)->get();
        }

        $miledistancedata = [
            'atmnData' => $atmnData,
            'miledata' => $miledata
        ];

        return response()->json(['data' => $miledistancedata]);
        
    }

    public function getdistrict(Request $request)
    {
        $d_id = $request->dist_id;
        $district_name = district::select('district')->where('d_id',$d_id)->get();
        return response()->json($district_name);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $availability_start_date = $request->start_date;
        $availability_end_date = $request->end_date;
        $district_id = $request->prefer_serve_district;
        $address = $request->address;
        $language = $request->language;
        $peacemaking = $request->peacemaking;
        $willing_commute = $request->willing_commute;
        $willing_move = $request->willing_move;
        $church_size = $request->church_size;
        $location = $request->location;

        $availability_data = UnAvailable::all();

        if($availability_start_date != "" || $availability_end_date != ""){
            $dataUnAvailable = UnAvailable::where('start_date', '>' ,$availability_start_date);
            $dataUnAvailable->where('end_date', '<' ,$availability_end_date);
            $UnAvailabledatas = $dataUnAvailable->get();
        }else{
            $UnAvailabledatas = '' ;
        }

        $rowsdata = DB::table('atmn_recruitment')->where('atmn_recruitment.status','Approve')
            ->LEFTJOIN('users','users.id','=','atmn_recruitment.user_id')
            ->where('users.user_type','=',Null)
            ->select('atmn_recruitment.id', 'atmn_recruitment.mainkey', 'atmn_recruitment.b_id', 'atmn_recruitment.district_id', 'atmn_recruitment.last_name', 'atmn_recruitment.first_name', 'atmn_recruitment.title', 'atmn_recruitment.status', 'atmn_recruitment.submit_status', 'atmn_recruitment.latitude', 'atmn_recruitment.longitude', 'atmn_recruitment.willing_commute', 'atmn_recruitment.onsite_arrangement', 'atmn_recruitment.comfortable_serving_church', 'atmn_recruitment.prefer_serve_church', 'atmn_recruitment.prefer_serve_district', 'atmn_recruitment.app_sent', 'atmn_recruitment.app_received', 'atmn_recruitment.atmn_certified', 'atmn_recruitment.license', 'atmn_recruitment.home_address', 'atmn_recruitment.email', 'atmn_recruitment.send_email', 'atmn_recruitment.home_phone', 'atmn_recruitment.cell_phone', 'atmn_recruitment.office_phone', 'atmn_recruitment.training', 'atmn_recruitment.church_serving', 'atmn_recruitment.affiliation', 'atmn_recruitment.district_issuing', 'atmn_recruitment.peacemaking', 'atmn_recruitment.ministry_area', 'atmn_recruitment.language', 'atmn_recruitment.comments', 'atmn_recruitment.fields_1', 'atmn_recruitment.approved_date', 'atmn_recruitment.agree', 'atmn_recruitment.user_id', 'atmn_recruitment.approved_by', 'users.name', 'users.username', 'users.user_type', 'users.email', 'users.status', 'users.requestforstaff', 'users.email_verified_at', 'users.district_id');

        if (!empty($district_id)) {
            $rowsdata->where('atmn_recruitment.prefer_serve_district', 'LIKE',$district_id);
        }
        if (!empty($willing_commute)) {
            $rowsdata->Where('atmn_recruitment.willing_commute', 'LIKE',"%{$willing_commute}%");
        }
        if (!empty($willing_move)) {
            $rowsdata->Where('atmn_recruitment.onsite_arrangement', 'LIKE',"%{$willing_move}%");
        }
        if (!empty($language)) {
            $rowsdata->Where('atmn_recruitment.language', 'LIKE',"%{$language}%");
        }
        if (!empty($peacemaking)) {
            $rowsdata->Where('atmn_recruitment.peacemaking', 'LIKE',"%{$peacemaking}%");
        }
        if (!empty($church_size)) {
            $rowsdata->Where('atmn_recruitment.comfortable_serving_church', 'LIKE',"%{$church_size}%");
        }
        if (!empty($location)){         
            $rowsdata->Where('atmn_recruitment.prefer_serve_church', 'LIKE',"%{$location}%");
            $data = $rowsdata->get();
        }
        else{
            $data = $rowsdata->get();
        }
        // dd($data);
        return response()->json(['pastor'=>$data,'availability'=>$UnAvailabledatas]);
    }

    public function assignedpastordata(Request $request)
    { 
        $currentdate = Carbon\Carbon::now()->toDateString();
        $pastorid = $request->pastorid;
        $placeddata = pastorassign::where('pastor_id',$pastorid)->where('assign_start_date','<=',$currentdate)->where('assign_end_date','>=',$currentdate)->first();
        $futureplaceddata = pastorassign::where('pastor_id',$pastorid)->where('assign_start_date','>',$currentdate)->where('assign_end_date','>',$currentdate)->first();
        return response()->json(['placeddata'=>$placeddata,'futureplaceddata'=>$futureplaceddata]);
    }

    public function dsviewofcandidate(Request $request)
    { 
        $pastorid = $request->id;
        $user_type = Auth::user()->user_type;
        if($user_type == "admin"){
            $route = route('admin.app.show',array(ATMNHelper::encryptUrl($pastorid)));
        }else{
            $route = route('ds.app.show',array(ATMNHelper::encryptUrl($pastorid)));
        }
        return response()->json(['success'=>$route]);
    }

    public function getAvailableDates(Request $request)
    { 
        $user_id = $request->id;
        $currentdate = Carbon\Carbon::now()->toDateTimeString();
        $availableData = UnAvailable::where('end_date', '>' ,$currentdate)->where('user_id',$user_id)->get();
        return response()->json(['availableData'=>$availableData]);
    }
    
}