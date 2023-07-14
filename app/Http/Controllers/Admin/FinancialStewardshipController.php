<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\FinancialStewardship;
use Redirect;

class FinancialStewardshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = FinancialStewardship::orderBy('id', 'desc')->get();
        return view('admin.financial-stewardship.index',['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if($id){
            $data['financial'] = FinancialStewardship::where('id', $id)->first();
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
       
        $financial = FinancialStewardship::find($id);
		if ($financial->destroy($id)) {
			return redirect()->route('financial-stewardship.index')->with('success',trans('main.financial.deletesuccess'));
		} else {
			return redirect()->route('financial-stewardship.index')->with('success',trans('main.financial.deletefailed'));
		}
    }
}