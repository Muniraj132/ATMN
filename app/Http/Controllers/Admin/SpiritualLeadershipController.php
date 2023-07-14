<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsEventsRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\SpiritualLeadership;
use Redirect;
use Request;
use Session;

class SpiritualLeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SpiritualLeadership::orderBy('id', 'desc')->get();
        return view('admin.spiritual_leadership.index',['data' => $data]);

    }

    /**
     * Display the specified resource based on requested Leadership
     * @access public
     * @param  int $id
     * @return json array data
     */
    public function show($id)
    {
        if($id){
            $data['spiritual'] = SpiritualLeadership::where('id', $id)->first();
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
        $spiritual = SpiritualLeadership::find($id);
    
		if ($spiritual->destroy($id)) {
			return redirect()->route('spiritual-leadership.index')->with('success',trans('main.spiritualleadership.deletesuccess'));
		} else {
			return redirect()->route('spiritual-leadership.index')->with('success',trans('main.spiritualleadership.deletefalid'));
		}
    }
}