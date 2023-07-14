<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\EffectiveOrganization;
use Redirect;

class EffectiveOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = EffectiveOrganization::orderBy('id', 'desc')->get();
        return view('admin.effective-organization.index',['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if($id){
            $data['effective'] = EffectiveOrganization::where('id', $id)->first();
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
       
        $effective = EffectiveOrganization::find($id);
		if ($effective->destroy($id)) {
			return redirect()->route('effective-organization.index')->with('success',trans('main.effective.deletesuccess'));
		} else {
			return redirect()->route('effective-organization.index')->with('success',trans('main.effective.deletefailed'));
		}
    }
}