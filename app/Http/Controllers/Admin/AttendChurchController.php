<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsEventsRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\AttendChurch;
use Redirect;
use Request;
use Session;

class AttendChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AttendChurch::orderBy('id', 'desc')->get();
        return view('admin.attend_church.index',['data' => $data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id){
        $data['attendchurch'] = AttendChurch::where('id', $id)->first();
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
    public function destroy($id)
    {   
        $attendchurch = AttendChurch::find($id);
    
		if ($attendchurch->destroy($id)) {
			return redirect()->route('attend-church.index')->with('success',trans('main.attendchurch.deletesuccess'));
		} else {
			return redirect()->route('attend-church.index')->with('success',trans('main.attendchurch.deletefalid'));
		}
    }
}