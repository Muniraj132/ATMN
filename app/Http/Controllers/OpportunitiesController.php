<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\opportunities;
use Yajra\DataTables\DataTables;

class OpportunitiesController extends Controller {

    public function opportunitiesindex()
    {
        return view('frontend.ds.uploadopportunities');
    }

    public function opportunitiesget(Request $request)
    {
      if ($request->ajax()) {
            $data = opportunities::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="opportunitiesedit" id="opportunitiesedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                    $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="opportunitiesdel"  id="opportunitiesdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } 
    }

    public function opportunitiesstore(Request $request)
    {
        $input = $request->except('_token');
        $resourcefiles = new opportunities($input);
        $resourcefiles->save();
        // Response
        $data = opportunities::orderBy('id', 'DESC')->get(); 
        $data['success'] = 1;
        $data['message'] = 'Added Successfully!';         
        return response()->json($data);
    }

    public function opportunitiesview(Request $request)
    {
        $reqId = $request->all();
        $opportunitiesData = opportunities::where('id',$reqId)->get();
        $opportunitiesDataVal = $opportunitiesData[0];
        return response()->json(['opportunitiesData'=> $opportunitiesDataVal]);
    }

    public function opportunitiesupdate(Request $request)
    {
        $input = $request->except('_token');
        $reqId = $request->id;
        $opportunitiesData = opportunities::where('id',$reqId)->update($input);

        return response()->json(['success'=> 'Updated Successfully']);
    }

    public function destroyopportunities(Request $request)
    {
        $reqId = $request->id;
        $opportunitiesData = opportunities::find($reqId);
        $opportunitiesData->delete();
        return response()->json(['opportunitiesData' => 'delete success']);
    }

}