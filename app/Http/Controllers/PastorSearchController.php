<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\resourcefiles;
use App\Models\countries;
use App\Models\state;
use App\Models\district;
use App\Models\Atmn;
use App\Models\User;
use App\Models\peacemaking;
use App\Models\ministry_area;
use App\Models\pastorassign;
use App\Models\comfortable_serving_church;
use Yajra\DataTables\DataTables;
use Carbon;
use DB;

class PastorSearchController extends Controller {

    public function pastorsearchindex(){

        $ministry_area = ministry_area::all();
        $pastorassign = pastorassign::all();

        // $atmn_data = Atmn::orderBy('id','DESC')->get();
        $currentdate = Carbon\Carbon::now()->toDateString();

        $atmn_data = DB::table('atmn_recruitment')
            ->LEFTJOIN('pastor_assign','atmn_recruitment.user_id','=','pastor_assign.pastor_id')
            ->LEFTJOIN('users','users.id','=','atmn_recruitment.user_id')
            ->where('users.user_type', '=', Null)
            ->where('atmn_recruitment.deleted_at', '=', Null)
            ->select([DB::RAW('DISTINCT(atmn_recruitment.user_id)'),'atmn_recruitment.id as atmn_id','atmn_recruitment.user_id','pastor_assign.pastor_id','atmn_recruitment.last_name','atmn_recruitment.first_name','atmn_recruitment.title','atmn_recruitment.status','pastor_assign.status as assign_status'])
            ->get();

        // dd($atmn_data);
        return view('frontend.search.pastorsearchindex',compact('atmn_data','ministry_area','pastorassign'));
    }
    
    public function getdistrict(Request $request)
    {
        $d_id = $request->dist_id;
        $district_name = district::select('district')->where('d_id',$d_id)->get();
        return response()->json($district_name);
    }

}