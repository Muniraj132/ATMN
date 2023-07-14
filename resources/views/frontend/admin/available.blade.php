@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;
$isUSER = ATMNHelper::isUSER();
$route = request()->is('*/district-placed-list/*') ? 'district-placed-list' : 'district-available-list';
@endphp

<style type="text/css">
    td div span:hover{
        text-decoration: underline;
        cursor: pointer;
    }
</style>

<div class="col-md-9" id="bri_ind_container">       
    <div class="search-container">
        @if (session('success'))
               <div class="alert alert-success" id="success">
                  {{ session('success') }}
               </div>
               <br>
        @endif
        <div class="row cards">
            <div class="row bar">
                @if($route == "district-placed-list")
                <label>{!! $district_value !!} - Pastor Placed</label>
                @endif
                @if($route == "district-available-list")
                <label>{!! $district_value !!} - Pastor Available</label>
                @endif
            </div>
            <br>
            <div class="row" style="padding:20px;">
                <div class="candidatesearchform">
                    <table id="example" class="table table-hover responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Pastor</th>
                                <th>Status</th>
                                <th>Assignment</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if($route == "district-placed-list")
                                @foreach($placedData as $value)
                                <tr>
                                    <td>
                                    <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}" target="_blank">   
                                        @if($value->title != null)
                                            {{$value->title}}.&nbsp;
                                        @endif {{$value->first_name}}&nbsp;{{$value->last_name}}
                                    </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}#step4#status-section" target="_blank">
                                            Approved
                                        </a>
                                    </td>
                                    <td>
                                        <div id="assignfield{{$value->pastor_id}}">
                                            <span class="assigned" id="placed_status{{$value->pastor_id}}" data-id="{{$value->pastor_id}}" style="color: green;" data-toggle="tooltip" title="Click to Edit Assign">Placed</span>
                                        </div>
                                        <input type='hidden' name='pastor_id{{$value->pastor_id}}' id='pastor_id{{$value->pastor_id}}' value='{{$value->pastor_id}}'>
                                    </td>
                                    <!-- <td>
                                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}"><i class="fa fa-eye"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                            @endif
                            @if($route == "district-available-list")
                                @foreach($availableData as $value)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}" target="_blank">   
                                            @if($value->title != null)
                                                {{$value->title}}.&nbsp;
                                            @endif {{$value->first_name}}&nbsp;{{$value->last_name}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}#step4#status-section">
                                            Approved
                                        </a>
                                    </td>
                                    <td>
                                    <div id="assignfield{{$value->user_id}}">
                                            <span class="not_assigned" id="placed_status{{$value->user_id}}" data-id="{{$value->user_id}}"  data-toggle="tooltip" title="Click to Assign">Not Assigned</span>
                                        </div>
                                            <input type='hidden' name='pastor_id{{$value->user_id}}' id='pastor_id{{$value->user_id}}' value='{{$value->user_id}}'>
                                    </td>
                                    <!-- <td>
                                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl($value->atmn_id)))}}"><i class="fa fa-eye"></i></a>
                                    </td> -->
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>         
</div>

<div class="container">
  <!-- Modal -->
  <div class="modal" id="myModal" >
    <div class="modal-dialog modal-md modal-centered">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4><span>Pastor Assignment</h4>
            <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <form id="assignForm">  
        @csrf                                                    
        <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label class="label-name">{!! trans('main.user.startdate') !!} <span class="astrict">*</span></label>
            <input type="date" name="assign_start_date" class="form-control" id="assign_start_date"  value="" >
            @if ($errors->has('assign_start_date'))
               <span class="help-block">
                  {{ $errors->first('assign_start_date') }}
               </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label class="label-name">{!! trans('main.user.enddate') !!} <span class="astrict">*</span></label>
            <input type="date" name="assign_end_date" class="form-control" id="assign_end_date" value="" >
            @if ($errors->has('end_date'))
               <span class="help-block">
                  {{ $errors->first('end_date') }}
               </span>
            @endif
          </div>
        </div>
        <input type="hidden" name="assign_id" id="assignid" value="">
        <input type="hidden" name="pastor_id" id="pastorid" value="">
        <input type="hidden" name="status" id="assignstatus" value="Placed">
        <div class="row">
          <div class="form-group col-md-12">
            <label class="label-name">{!! trans('main.user.churches') !!} <span class="astrict">*</span></label>
            <input class="form-control" type="text" name="church_name" id="church_name" value="">
            <!-- <textarea name="reason" class="form-control" id="reason">{{ $reason ?? '' }}</textarea> -->
            @if ($errors->has('reason'))
               <span class="help-block">
                  {{ $errors->first('reason') }}
               </span>
            @endif
          </div>
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn m-t-15 waves-effect mb-3" id="addassign" style="display:none">{!! trans('main.assign') !!}</button>
        <button class="btn m-t-15 waves-effect mb-3" id="updateassign" style="display:none">{!! trans('main.update') !!}</button>
        <button class="btn m-t-15 waves-effect mb-3" id="closeModal" type="button">{!! trans('main.close') !!}</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script> 
<script>

    $(document).ready(function() {

    
    $('.assigned').click(function(){ 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        var val = $("#pastor_id"+data+"").val();
        getassignedpastor(val);
        $('#myModal').appendTo("body").modal('toggle');
        $('#addassign').attr('style','display:none');
        $('#updateassign').removeAttr('style');
        $('#pastorid').val(val);
    });

    $('.not_assigned').click(function(){ 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        var val = $("#pastor_id"+data+"").val();
        $('#myModal').appendTo("body").modal('toggle');
        $('#updateassign').attr('style','display:none');
        $('#addassign').removeAttr('style');
        $('#pastorid').val(val);
        startdate = "assign_start_date";
        enddate = "assign_end_date";
        getvalstart = "";
        getvalend = "";
        daterestriction(startdate,enddate,getvalstart,getvalend);
        
    });

    $("#closeModal").click(function() {
        validator.resetForm();
        $("#assignForm").trigger("reset");
        $('#myModal').modal('hide');
    });

    $("#CloseModal").click(function() {
        validator.resetForm();
        $("#assignForm").trigger("reset");
        $('#myModal').modal('hide');
    });



    var validator = $("#assignForm").validate({
        rules: {
          assign_start_date : {
            required: true,
          },
          assign_end_date : {
            required: true,
          },
          church_name : {
            required: true,
          },
        },
        messages : {
          assign_start_date: {
           required: "Please select start date",
          },
          assign_end_date: {
           required: "Please select end date",
          },
          church_name: {
           required: "Please enter church name",
          },
        },
        submitHandler: function(form) {
        var thisForm = $(form);
        var formID =  thisForm.attr("id");
        var url ="{{ route('pastorassign') }}";
        pastorAssign(formID, url);
        }
    });

        

      $("#example").DataTable({
        aaSorting: [],
        responsive: true,

        columnDefs: [
          {
            responsivePriority: 1,
            targets: 0
          },
          {
            responsivePriority: 2,
            targets: -1
          }
        ]
      });

      $(".dataTables_filter input")
        .attr("placeholder", "Search here...")
        .css({
          width: "300px",
          display: "inline-block"
        });

    });

    function pastorAssign(formID, url) {
        var data = $('#'+formID+'').serializeArray();
        var pastor_id = $('#pastorid').val();
        $.ajax({
            method : "POST",
            url: url,
            data : data,
            success: function(response) {
                $("#assignForm").trigger("reset");
                $('#myModal').modal('hide');
                if(response.success == "assign success"){
                    swal("Success!", "Pastor Placed Successfully.", "success");
                }
                if(response.success == "update success"){
                    swal("Success!", "Pastor Placed Updated Successfully.", "success");
                }
                if(response.success == "assign success"){
                    $("div#assignfield"+pastor_id+"").empty().append('<span class="assigned" id="placed_status'+pastor_id+'" data-id="'+pastor_id+'" style="color: green;" data-toggle="tooltip" title="Click to Edit Assign">Placed</span>');
                }
            }
        });
    }

    function getassignedpastor(val){
        var data = {'id':val};
        $.ajax({
            method : "get",
            url: "{{route('pastorgetedit')}}",
            data : data,
            success: function(response) {
                $('#assign_start_date').val(response.pastorassignData['assign_start_date']);
                $('#assign_end_date').val(response.pastorassignData['assign_end_date']);
                $('#church_name').empty().val(response.pastorassignData['church_name']);
                $('#pastorid').empty().val(response.pastorassignData['pastor_id']);
                $('#assignid').empty().val(response.pastorassignData['id']);

                startdate = "assign_start_date";
                enddate = "assign_end_date";
                getvalstart = response.pastorassignData['assign_start_date'];
                getvalend = response.pastorassignData['assign_end_date'];
                daterestriction(startdate,enddate,getvalstart,getvalend);
            }
        });
    }
</script>
 
@endsection