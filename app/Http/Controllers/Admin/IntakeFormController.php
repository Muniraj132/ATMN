<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsEventsRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\IntakeForm;
use App\Helpers\DBCHelper;
use Redirect;
use Request;
use Session;

class IntakeFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IntakeForm::orderBy('id', 'desc')->get();
        return view('admin.intakeform.index',['data' => $data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['intakeform'] = IntakeForm::where('id', $id)->first();
        return view('admin.intakeform.show',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $intakeform = IntakeForm::find($id);
    
		if ($intakeform->destroy($id)) {
			return redirect()->route('intake-form.index')->with('success',trans('main.intakeform.deletesuccess'));
		} else {
			return redirect()->route('intake-form.index')->with('success',trans('main.intakeform.deletefalid'));
		}
    }
}