<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\WorshipGathering;
use Redirect;

class WorshipGatheringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = WorshipGathering::orderBy('id', 'desc')->get();
        return view('admin.worship-gathering.index',['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if($id){
            $data['worship'] = WorshipGathering::where('id', $id)->first();
            echo json_encode($data);
        } else {
            echo '0';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       
        $worship = WorshipGathering::find($id);
		if ($worship->destroy($id)) {
			return redirect()->route('worship-gathering.index')->with('success',trans('main.worship.deletesuccess'));
		} else {
			return redirect()->route('worship-gathering.index')->with('success',trans('main.worship.deletefailed'));
		}
    }
}