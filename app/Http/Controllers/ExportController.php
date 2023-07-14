<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Atmn;
use App\Models\pastorassign;
use App\Models\district;
use App\Models\peacemaking;
use Response;
use File;
use Carbon;

class ExportController extends Controller {

   public function exportXlxs(Request $request) {
      $id = $request->all();
      $data = $id['arr'];
      $fileName = 'tasks.csv';
      $headers = array(
         "Content-type"        => "text/csv",
         "Content-Disposition" => "attachment; filename=$fileName",
         "Pragma"              => "no-cache",
         "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
         "Expires"             => "0"
      );
      if (!File::exists(public_path()."/files")) {
         File::makeDirectory(public_path() . "/files");
      }
      //creating the download file
      $filename =  public_path("files/Candidate list.csv");
      $handle = fopen($filename, 'w');
      //adding the first row
      fputcsv($handle, [
         "First Name",
         "Last Name",
         "Title",
         "Street 1",
         "Street 2",
         "City",
         "State",
         "Country",
         "Zip",
         "Email",
         "Status",
         "Assignment Start Date",
         "Assignment End Date",
         "Church Name",
         "Availability",
         "Language",
         "Peacemaking",
         "Willing to Commute",
         "Willing to Move",
         "Preferred Church Size",
         "Prefered Church",
         "Prefered District",
      ]);
      foreach($data as $value){

            $currentdate = Carbon\Carbon::now()->toDateString();
            
            $arrdata = Atmn::where('user_id',$value)->first();
            $placeddata = pastorassign::where('pastor_id',$value)->where('assign_start_date','<=',$currentdate)->where('assign_end_date','>=',$currentdate)->get();
            $placeddatacount =count($placeddata);
            // dd($placeddatacount);
            if($placeddatacount != 0){
               $status = "Placed";
            }else{
               $futureplaceddata = pastorassign::where('pastor_id',$value)->where('assign_start_date','>',$currentdate)->where('assign_end_date','>',$currentdate)->get();
               $futureplacedcount =count($futureplaceddata);
               // dd($futureplacedcount);
               if($futureplacedcount != 0){
                  $status = "Future Placed";
               }else{
                  $status = $arrdata->status;
               }
               
            }
            $name = "".$arrdata->title.". ".$arrdata->first_name." ".$arrdata->last_name;
            $email = $arrdata->email;
            $homeaddress = $arrdata->home_address;
            $address = explode(",", $homeaddress);
            $d_id = $arrdata->district_id;
            $district_name = district::select('district')->where('d_id',$d_id)->first();

         fputcsv($handle, [
            $arrdata->first_name,
            $arrdata->last_name,
            $arrdata->title,
            $address[0],
            $address[1],
            $address[2],
            $address[3],
            $address[4],
            $address[5],
            $arrdata->email,
            $status,
            $placeddata[0]->assign_start_date ?? $futureplaceddata[0]->assign_start_date ?? '',
            $placeddata[0]->assign_end_date ?? $futureplaceddata[0]->assign_end_date ?? '',
            $placeddata[0]->church_name ?? $futureplaceddata[0]->church_name ?? '',
            'Y',
            $arrdata->language,
            $arrdata->peacemaking,
            $arrdata->willing_commute,
            $arrdata->onsite_arrangement,
            $arrdata->comfortable_serving_church,
            $arrdata->prefer_serve_church,
            $district_name->district,
         ]);
      }
      fclose($handle);
      return Response::download($filename, "Candidate list.csv", $headers);
   }

}