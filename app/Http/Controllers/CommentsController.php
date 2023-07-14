<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\resourcefiles;
use Yajra\DataTables\DataTables;
use App\Models\pastorassign;
use App\Models\applicationcomments;
use App\Models\peacemaking;
use Auth;
use Carbon; 


class CommentsController extends Controller
{
    public function pastorcomment(Request $request){


   $comment = $request->all();
   
    $applicationcomments = new applicationcomments($comment);
    $applicationcomments ->save();
    return response()->json(['success'=> "success"]);
    
    }

    public function commentview(Request $request){
        $id=$request->id;
        $commentview = applicationcomments::where('id',$id)->first();
        return response()->json(['commentview'=> $commentview]);
    }


    public function commentedit(Request $request){
        $id=$request->id;
        $commentupdate = applicationcomments::where('id',$id)->first(); 
        return response()->json(['commentupdate'=> $commentupdate]);
    }


   public function commentupdate(Request $request){

        $input = $request->all();
       
        $commentupdate = applicationcomments::where('id',$input)->first();
        $commentupdate->update($input);
        return response()->json(['commentupdate'=> $commentupdate]);
    }


    public function commentdelete(Request $request)
    {
        $reqdel = $request->id;

        $commentsdatadel = applicationcomments::find($reqdel);
        $commentsdatadel->delete();

        return response()->json(['commentsdatadel' => 'delete success','commentid' => $reqdel]);
    }
  
}
  
