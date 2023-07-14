<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\resourcefiles;
use Yajra\DataTables\DataTables;
use App\Models\pastorassign;
use App\Models\assignstatushistory;
use App\Models\peacemaking;
use Auth;
use Carbon; 

class AssignmentController extends Controller {

   public function pastorassign(Request $request){

        $currentDate = Carbon\Carbon::now()->toDateString();

        $request->merge([
            'assigned_by' => Auth::user()->id,
            'assigned_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        if($request->assign_id == Null){
            $assignid = $request->assign_id;
            $pastorid = $request->pastor_id;
            $pastorassignData = pastorassign::where('id',$assignid)->count();
        }else{
            $pastorid = $request->pastor_id;
            $pastorassignData = pastorassign::where('pastor_id',$pastorid)->count();
        }

        if($pastorassignData == 0){
            $data = $request->all();
            $pastorAssign = pastorassign::where('pastor_id',$pastorid)
                ->where('assign_start_date','<',$currentDate)
                ->where('assign_end_date','<',$currentDate)
                ->forcedelete();
            $pastorAssign = new pastorassign($data);
            $pastorAssign->save();
            $pastorAssignHistory = new assignstatushistory($data);
            $pastorAssignHistory->save();
            $success = "assign success";
        }
        if($pastorassignData != 0){
            $data = $request->except('assign_id');
            $pastorAssign = pastorassign::where('pastor_id',$pastorid)->update($data);
            $pastorAssignHistory = new assignstatushistory($data);
            $pastorAssignHistory ->save();
            $success = "update success";
        };
        
        $pastorAssigndata = pastorassign::where('pastor_id',$pastorid)->first();

        return response()->json(['success'=> $success ,'data' => $pastorAssigndata]);   
    }

    public function pastorgetedit(Request $request){

        $currentDate = Carbon\Carbon::now()->toDateString();
        $user_id = $request->id;
        $pastorassignData = pastorassign::where('pastor_id',$user_id)->orderBy('id', 'DESC')->first();

        if($pastorassignData['assign_start_date'] > $currentDate){
            $editType = "futureAssigned";
        }else{
            $editType = "Assigned";
        }
        return response()->json(['pastorassignData'=> $pastorassignData,'currentDate'=>$currentDate,'editType'=>$editType]);   
    }

}