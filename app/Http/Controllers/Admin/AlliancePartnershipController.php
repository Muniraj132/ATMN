<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\AlliancePartnership;
use Redirect;

class AlliancePartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = AlliancePartnership::orderBy('id', 'desc')->get();
        return view('admin.alliance-partnership.index',['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if($id){
            $data['alliance'] = AlliancePartnership::where('id', $id)->first();
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
       
        $alliance = AlliancePartnership::find($id);
		if ($alliance->destroy($id)) {
			return redirect()->route('alliance-partnership.index')->with('success',trans('main.alliance.deletesuccess'));
		} else {
			return redirect()->route('alliance-partnership.index')->with('success',trans('main.alliance.deletefailed'));
		}
    }
}