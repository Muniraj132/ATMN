<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Slider Controller Class
 * Provides functionality for maintainining the slider detail for Frontend
 *
 * @Package             Controllers
 * @Author              Cyril P
 * @Created On          17-05-2018
 * @Modified            Cyril P
 * @Modified On         17-05-2018
 * @Reviewed            Loganathan N
 */
namespace App\Http\Controllers\Pastor;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Helpers\STCHelper;
use App\Models\PastorRecruitment;
use Redirect;
use Session;
use File;

class PastorRecruitmentController extends Controller
{

    /**
     * Display a listing of the all the resource
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = Slider::all();
        return view('admin.slider.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['order_by'] = STCHelper::get_order_by();
        return view('admin.slider.create', $data);
    }

     /**
     * Store a newly created resource in storage
     * @access public
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    { 
		$input = $request->all();
		$data['status'] = $input['status'];
        $data['title'] = $input['title'];
		$data['short_description'] = $input['short_description'];
        $filedata = Slider::upload_file($request->file('image'));
        $data['image'] = $filedata['fileOriginalName'];
        $data['order_by'] = $input['order_by'];
        $file = new Slider($data);
        $file->save();
        $dbcheck    = STCHelper::dbcheck();
        if($dbcheck == 1){
            $files = new SliderOnline($data);
            $files->save();
        }
        return redirect()->route('slider.index')->with('success',trans('main.slider.addsuccess'));
	  
    }

     /**
     * Display the specified resource based on requested slider
     * @access public
     * @param  int $id
     * @return json array data
     */
    public function show($id)
    {
        if($id){
            $data['slider'] = Slider::where('id', $id)->first();
            echo json_encode($data);
        } else {
            echo '0';
        }
    }	

     /**
     * Show the form for editing the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = STCHelper::decryptUrl($id);
       $data['slider'] = Slider::where('id', $id)->first();
       $data['order_by'] = STCHelper::get_order_by();
       return view('admin.slider.edit', $data);
    }

     /**
     * Update the specified resource
     * @access public
     * @param  \Illuminate\Http\Request $request, int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $input = $request->all();
        $file = Slider::findOrFail($id);
        

        //For Deleting a File
        if(!empty($request->file('image'))){
            $filedelete = $file->image;
            if(\File::exists(public_path(trans('main.slider.imageup').$filedelete))){
              \File::delete(public_path(trans('main.slider.imageup').$filedelete));
            }
        }
		$data['status'] = $input['status'];
        $data['title'] = $input['title'];
		$data['short_description'] = $input['short_description'];
		$filedata = Slider::upload_file($request->file('image'));
		if ($filedata) {
        $data['image'] = $filedata['fileOriginalName'];
		}
        $data['order_by'] = $input['order_by'];
        $file->update($data);
        $dbcheck    = STCHelper::dbcheck();
        if($dbcheck == 1){
             $checkId = SliderOnline::where('id', $id)->first();
            if($checkId){
                $files = SliderOnline::findOrFail($id);
                $files->update($data);
            }
        }
        
        return redirect()->route('slider.index')->with('success',trans('main.slider.updatesuccess'));
    }
	
     /**
     * Remove the specified resource
     * @access public
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $id = STCHelper::decryptUrl($id);
        $files = Slider::findOrFail($id);
        $filedelete = $files['image'];
        if(\File::exists(public_path(trans('main.slider.imageup').$filedelete))){
          \File::delete(public_path(trans('main.slider.imageup').$filedelete));
        }
        $dbcheck    = STCHelper::dbcheck();
        if($dbcheck == 1){
            $checkId = SliderOnline::where('id', $id)->first();
            if($checkId){
                $file = SliderOnline::findOrFail($id);
                $file->delete();
            }
        }
        $files->delete();
		return redirect()->route('slider.index')->with('success',trans('main.slider.deletesuccess'));
    }
}
