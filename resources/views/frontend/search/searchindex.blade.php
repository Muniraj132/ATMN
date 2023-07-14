@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;

use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;
$isUSER = ATMNHelper::isUSER();
$country = '';
$stateval = '';
$ministry_area_val  = '';
@endphp

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
                <label>Candidate Search</label>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div style="padding: 10px 0 22px 0px;">
                        <div class="row">
                            <div class="form-group col-md-12">
                                  <h5>Include Pastor Preferences</h5>
                            </div>
                            <form role="form" id="candidatesearchform">
                            <div class="row" style="font-size:13px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="distance" data-id="address" value="">
                                            <label class="form-check-label">
                                              Distance From Church
                                            </label>
                                        </div>
                                        <textarea class="form-control address" id="address" name="address" style="height: 90px;" disabled="disabled" placeholder="Enter church address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding:8px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="availabilty" data-id="availabilty" value="">
                                            <label class="form-check-label">
                                              Time Availabilty
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Opening Start Date</label>
                                                <input type="date" class="form-control" name="start_date" id="start_date" disabled="disabled">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Opening End Date</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="churchsize" data-id="church_size"  value="">
                                            <label class="form-check-label">
                                              Church Size
                                            </label>
                                        </div>
                                        <select class="form-select" name="church_size" id="church_size" disabled="disabled">
                                            <option value=""></option>
                                            @foreach($serve_church as $value)
                                            <option value="{{$value->name}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="language" data-id="language" value="">
                                            <label class="form-check-label">
                                                Language
                                            </label>
                                        </div>
                                        <div style="padding-left: 20px;">
                                            <input type="checkbox" class="form-check-input" value="Spanish" name="language" id="language" disabled="disabled" style="margin: 4px 0px 0 0;">
                                            &nbsp;<label style="padding-left:16px">Spanish</label>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div style="padding:5px 5px 5px 20px">
                                                    <input type="checkbox" class="form-check-input" name="commute" data-id="commute" value="">
                                                    <label class="form-check-label">
                                                      Willing to Commute
                                                    </label>
                                                </div>
                                                <div style="padding-left: 20px;">
                                                    <input type="radio" class="form-radio-input" value="Y" name="willing_commute" id="commute1" disabled="disabled">&nbsp;<label>Yes</label>&nbsp;
                                                    <input type="radio" class="form-radio-input" name="willing_commute" id="commute2" value="N" disabled="disabled">&nbsp;<label>No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                               <div style="padding:5px 5px 5px 20px">
                                                    <input type="checkbox" class="form-check-input" name="move" data-id="move" value="">
                                                    <label class="form-check-label">
                                                      Willing to Move
                                                    </label>
                                                </div>
                                                <div style="padding-left: 20px;">
                                                    <input type="radio" class="form-radio-input" value="Y" name="willing_move" id="move1" disabled="disabled">&nbsp;<label>Yes</label>&nbsp;
                                                    <input type="radio" class="form-radio-input" value="N" name="willing_move" id="move2" disabled="disabled">&nbsp;<label>No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="peacemaking" data-id="peacemaking" value="">
                                            <label class="form-check-label">
                                              Peacemaking
                                            </label>
                                        </div>
                                        <div style="padding-left: 20px;">
                                            <select class="form-select" name="peacemaking" id="peacemaking" disabled="disabled">
                                                <option value=""></option>
                                                @foreach($peacemaking as $value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                         <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="peacemaking" data-id="peacemaking" value="">
                                            <label class="form-check-label">
                                             Peacemaking
                                            </label>
                                        </div>
                                        <div style="padding-left: 20px;">
                                            <input type="radio" class="form-radio-input" value="Y" name="peacemaking" id="peacemaking1" disabled="disabled">&nbsp;<label>Yes</label>&nbsp;
                                            <input type="radio" class="form-radio-input" name="peacemaking" id="peacemaking2" value="N" disabled="disabled">&nbsp;<label>No</label>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="location" data-id="location" value="">
                                            <label class="form-check-label">
                                              Location
                                            </label>
                                        </div>
                                        <div class="row" style="padding-left: 20px;">
                                            <div class="col-sm-6">
                                                <input type="radio" class="form-radio-input" name="location" id="location3" value="in a rural area" disabled="disabled">&nbsp;<label>Rural Area</label><br>
                                                <input type="radio" class="form-radio-input" name="location" id="location1" value="in a small town" disabled="disabled">&nbsp;<label>Small Town</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="radio" class="form-radio-input" name="location" id="location2" value="in a suburban area" disabled="disabled">&nbsp;<label>Suburban Area</label><br>
                                                <input type="radio" class="form-radio-input" name="location" id="location4" value="in the city" disabled="disabled">&nbsp;<label>City</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding:5px 5px 5px 20px">
                                            <input type="checkbox" class="form-check-input" name="district" data-id="district" value="">
                                            <label class="form-check-label">
                                              District
                                            </label>
                                        </div>
                                        <div style="padding-left: 20px;">
                                            <select class="form-select" name="prefer_serve_district" id="district" disabled="disabled">
                                                <option value=""></option>
                                                <option value="Any">Any District</option>
                                                @foreach($district as $value)
                                                <option value="{{$value->d_id}}">{{$value->district}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-size:14px">
                                    <div class="alert alert-danger" id="errorsection" style="display: none;">
                                        * Please select any one of the field.
                                        <div style="float:right;margin-top: -5px;">
                                            <button type="button" id="errorsectionclose" class="close">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span id='loader' style='display: none;'>
                                        <img src="{{asset('assets/img/gif/ajaxload.gif')}}" width='32px' height='32px' >
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <span>
                                            <button class="search" id="candidatesearch">Search Candidate</button>&nbsp;
                                            <button class="reset" id="reset">Clear</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <section class="pastordatasection" id="pastordatasection" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="row" style="padding:20px;">
                                <div class="candidatesearchform" style="font-size:13px">
                                    <div class="row bar">
                                        <label>Candidate List</label>
                                    </div>
                                    <br>
                                    <div class="alert alert-success" id="exportsuccess" style="display:none">
                                       Exported Successfully.
                                        <div style="float:right;margin-top: -5px;">
                                            <button type="button" id="Closesuccess" class="close" data-dismiss="modal" >&times;</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success" id="assignedsuccess" style="display:none">
                                       Pastor Placed Successfully.
                                        <div style="float:right;margin-top: -5px;">
                                            <button type="button" id="CloseSuccess" class="close" data-dismiss="modal" >&times;</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success" id="updatesuccess" style="display:none">
                                       Pastor Placed Updated Successfully.
                                        <div style="float:right;margin-top: -5px;">
                                            <button type="button" id="closeSuccess" class="close" data-dismiss="modal" >&times;</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" id="exportsection" style="display:none">
                                      <div class="col-sm-1" align="center">
                                        <input class="form-check-input" type="checkbox" name="checkAll" id="checkAll">
                                      </div>
                                      <div class="col-sm-8 datarecords">
                                        <span>Select All</span>
                                      </div>
                                      <div class="col-sm-3" align="right" style="padding-right: 20px;">
                                        <button class="exportbtn" id="exportbtn" data-toggle="tooltip" title="Export to CSV" disabled="disabled"><i class="mdi mdi-file-excel"></i></button>
                                      </div>
                                    </div>
                                    <br>
                                    <div id="pastordata" class="pastordata">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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

            <!-- comments model -->

            <div class="container">
              <!-- Modal -->
              <div class="modal" id="commentsModal" >
                <div class="modal-dialog modal-md modal-centered">
                <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" style="background-color:#801214;color: #fff;">
                        <h4><span>New Comments</h4>
                        <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
                    </div>
                    <form id="commentsForm">  
                    @csrf                                                    
                    <div class="modal-body">
                    <input type="hidden" name="pastor_id" id="commentspastor_id" value="">
                    <input type="hidden" name="submitted_by" id="submitted_by" value="{{ Auth::user()->id }}">
                    
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label class="label-name">{!! trans('main.user.comments') !!} <span class="astrict">*</span></label>
                       <!--  <input class="form-control" type="text" name="comments" id="comments" value=""> -->
                        <textarea name="comment" class="form-control" id="comment"></textarea>
                        @if ($errors->has('reason'))
                           <span class="help-block">
                              {{ $errors->first('reason') }}
                           </span>
                        @endif
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn m-t-15 waves-effect mb-3" id="addcomments" style="display:none">{!! trans('main.submit') !!}</button>
                   
                    <button class="btn m-t-15 waves-effect mb-3" id="closecomments" type="button">{!! trans('main.close') !!}</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
    
  $(document).ready(function(){ 

    /* ------- start date to end date Restriction ------- */
    let assign_start_date = document.querySelector("#assign_start_date").min = new Date().toISOString().slice(0, 10);
    let assign_end_date = document.querySelector("#assign_end_date").min = new Date().toISOString().slice(0, 10);
    var start = document.getElementById('assign_start_date');
    var end = document.getElementById('assign_end_date');
    start.addEventListener('change',function() {   
        if (start.value)
            end.min = start.value;
    }, false);

    $("#checkAll").click(function () {
        var check = $(this).prop('checked');
        if(check == true){
            $('#exportbtn').removeAttr('disabled');
        }else{
            $('#exportbtn').attr('disabled','disabled');
        }
      $('input:checkbox[name="export"]').not(this).prop('checked', this.checked);
    });

    $(document).on('click', 'input[name="export"]', function() {

        var check = $(this).prop('checked');

        if(check == true){
            $('#exportbtn').removeAttr('disabled');
        }else{
            $('#exportbtn').attr('disabled','disabled');
            $('input:checkbox[name="checkAll"]').removeAttr('checked');
        } 

        i = 0;
        var arr = [];
        $('#export:checked').each(function () {
            arr[i++] = $(this).val();
        });
        
        if(arr != ''){
            $('#exportbtn').removeAttr('disabled');
        }else{
            $('#exportbtn').attr('disabled','disabled');
            $('input:checkbox[name="checkAll"]').removeAttr('checked');
        }

    });

    $('.candidatesearchform').on('click','#pastorassign',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        var val = $("#pastor_id"+data+"").val();
        $('#myModal').appendTo("body").modal('toggle');
        $('#updateassign').attr('style','display:none');
        $('#addassign').removeAttr('style');
        $('#pastorid').val(val);
    });

    $('.candidatesearchform').on('click','#pastorcomment',function() { 
        // alert('in');
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        var val = $("#pastor_id"+data+"").val();
        $('#commentsModal').appendTo("body").modal('toggle');
        $('#updatecomments').attr('style','display:none');
        $('#addcomments').removeAttr('style');
        $('#commentspastor_id').val(val);
       
    });

    $('.candidatesearchform').on('click','#editassign',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        var val = $("#pastor_id"+data+"").val();
        getassignedpastor(val);
        $('#myModal').appendTo("body").modal('toggle');
        $('#addassign').attr('style','display:none');
        $('#updateassign').removeAttr('style');
        $('#pastorid').val(val);
    });

    $('.candidatesearchform').on('click','#pastorview',function() { 
        var data = $(this).attr('data-id');
        pastorapplicationview(data);
    });

    $("#closeModal").click(function() {
        validator.resetForm();
        $("#assignForm").trigger("reset");
        $('#myModal').modal('hide');
    });

    $("#closecomments").click(function() {
         commentsvalidator.resetForm();
        $("#commentsForm").trigger("reset");
        $('#commentsModal').modal('hide');
    });

    $("#Closesuccess").click(function() {
        $('#exportsuccess').attr('style','display:none');
    });

    $("#CloseSuccess").click(function() {
        $('#assignedsuccess').attr('style','display:none');
    });

    $("#closeSuccess").click(function() {
        $('#updatesuccess').attr('style','display:none');
    });
    

    $("#errorsectionclose").click(function() {
        $('#errorsection').attr('style','display:none');
    });

    
    $('#exportbtn').click(function () {
        i = 0;
        var arr = [];
        $('#export:checked').each(function () {
            arr[i++] = $(this).val();
        });
        exportCSV(arr);
    });

    $("input[type='checkbox']").on('change',function() {
        var $id = $(this).attr("data-id");
        if($(this).is(":checked")){
            $("#"+$id+"").removeAttr('disabled');
            if($id == "availabilty"){
                $("#start_date").removeAttr('disabled');
                $("#end_date").removeAttr('disabled');
            }
            if($id == "move"){
                $("#move1").removeAttr('disabled');
                $("#move2").removeAttr('disabled');
            }
            if($id == "commute"){
                $("#commute1").removeAttr('disabled');
                $("#commute2").removeAttr('disabled');
            }
            if($id == "location"){
                $("#location1").removeAttr('disabled');
                $("#location2").removeAttr('disabled');
                $("#location3").removeAttr('disabled');
                $("#location4").removeAttr('disabled');
            }
            if($id == "language"){
                $("#language1").removeAttr('disabled');
            }
        }
        else {
            $("#"+$id+"").attr('disabled','disabled');
            if($id == "district"){
              $("#district").attr('disabled','disabled').val('');
            }if($id == "church_size"){
              $("#church_size").attr('disabled','disabled').val('');
            }
            if($id == "availabilty"){
                $("#start_date").attr('disabled','disabled').val('');
                $("#end_date").attr('disabled','disabled').val('');
            }
            if($id == "move"){
                $("#move1").attr('disabled','disabled').prop('checked', false);
                $("#move2").attr('disabled','disabled').prop('checked', false);
            }
            if($id == "commute"){
                $("#commute1").attr('disabled','disabled').prop('checked', false);
                $("#commute2").attr('disabled','disabled').prop('checked', false);
            }
            if($id == "location"){
                $("#location1").attr('disabled','disabled').prop('checked', false);
                $("#location2").attr('disabled','disabled').prop('checked', false);
                $("#location3").attr('disabled','disabled').prop('checked', false);
                $("#location4").attr('disabled','disabled').prop('checked', false);
            }
            if($id == "language"){
              $("#language").attr('disabled','disabled').prop('checked', false);
            }
        }
    });

    $(".reset").click(function(e) {
        e.preventDefault();
        $("#pastordatasection").attr('style','display:none');
        $("#errorsection").attr('style','display:none');
        $(this).closest('form').find("select,textarea,input[type='radio'],input[type='date']").val("").attr('disabled','disabled');
        $(this).closest('form').find("input[type='checkbox'],input[type='radio']").prop('checked', false);
        $("#language").attr('disabled','disabled');
    });

    $('#candidatesearch').on('click',function(e) {
        e.preventDefault();
        var data = $('#candidatesearchform').serializeArray();
        var address = $("#address").val();
        if(address != ''){
            var latlong = latlong1(address);
            // var pastordata = getpastorslatlon();
            // $.each(pastordata, function (i,getdata){
            //     var pastorid = getdata.id;
            //     var lat2 = getdata.latitude;
            //     var lon2 = getdata.longitude;
            //     var miles = getDistanceFromLatLonInKm(lat2,lon2,latlong.lat1,latlong.lon1);
            // });
            getdata(data,latlong);
        }else{
            var latlong = "";
            getdata(data,latlong);
        } 
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

    // comments in candidate search

    var commentsvalidator = $("#commentsForm").validate({
        rules: {
          comment : {
            required: true,
          },
        },
        messages : {
          comment: {
            required: "Please Enter the Comments",
          },
        },
        submitHandler: function(form) {
        
        var formData = $("#commentsForm").serializeArray();     
         $.ajax({
                method : "post",
                url: "{{ route('pastorcomment') }}",
                data : formData,
                async: false,
                headers: {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin":"*",
                },
                success:function(response){
                //response.commentid
                    $("#commentrow"+response.commentid+"").remove();
                    $("#commentsForm").trigger("reset");
                    $('#commentsModal').modal('hide');
                    swal("Success!", "Comment Added Successfully.", "success");
                       },
                 error:function(error){
                     console.log(error)
                      } 
                    });
                   }
                 });

    function getpastorslatlon(){
        var pastordata;
        $.ajax({
            method : "Get",
            url: "{{ route('getpasteraddress') }}",
            async: false,
            success: function(response) {
                 pastordata = response.data;
            }
        });
        return pastordata;
    }

    function latlong1(address){
        var latlong;
        if(address != ""){
            var churchgeocode = {
            'address' : address,
            '_token'  : "{{ csrf_token() }}"
                };
            
            $.ajax({
                method : "post",
                url: "{{ route('getgeocode') }}",
                data : churchgeocode,
                async: false,
                headers: {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin":"*",
                },
                success: function(response) {
                    lat1 = response.geocode['latitude'];
                    lon1 = response.geocode['longitude'];
                    latlong = {
                        'lat1' : lat1,
                        'lon1' : lon1
                    };
                }
            });
        }
        return latlong;
    }

    function getdata(data,latlong){
        var datas = data;    
        var churchlatlong = latlong;        
        $.ajax({
            method : "get",
            url: "{{ Route('search') }}",
            data : datas,
            beforeSend: function(){
                // Show image container
                $("#loader").show();
            },
            success: function(response) {
               
                 data = response.pastor;
                 var availableUserList =[];
                 var  availablityData = response.availability;
                  $.each(availablityData, function (i,availData){
                    availableUserList.push(availData.user_id);
                  });
                 
                 // a.includes(2); 
                $("#pastordata").empty();
                $("#checkAll").prop('checked', false);
               
                if(data == 'errorsection'){
                    $("#errorsection").removeAttr('style');
                }else{
                    if(data == ''){
                        $("#pastordatasection").removeAttr('style');
                        $("#pastordata").append('<div class="row" align="center"><label>No Records Available</label></div>');
                        $("#exportsection").attr('style','display:none'); 
                    }else{
                        $("#exportsection").removeAttr('style','display:none');
                        $("#errorsection").attr('style','display:none');
                        $.each(data, function (i,getdata){
                            if(getdata.prefer_serve_district == 'Any'){
                                var $district_name = 'ANY DISTRICT';
                            }
                            if(getdata.prefer_serve_district != 'Any'){
                                var district_value = getdistrict(getdata.prefer_serve_district);
                                if(district_value != ''){
                                    var $district_name = district_value[0].district;
                                }
                            }
                            
                            var willing_commute = getdata.willing_commute;
                            var language = getdata.language;
                            var peacemaking = getdata.peacemaking;
                            var onsite_arrangement = getdata.onsite_arrangement;
                            var comfortable_serving_church = getdata.comfortable_serving_church;
                            var prefer_serve_church = getdata.prefer_serve_church;
                            var checkmark = "<i class='mdi mdi-check-circle'></i>&nbsp;&nbsp;";
                            var ministry_area = getdata.ministry_area;

                            if($district_name != null){
                                let district_name = $district_name.toUpperCase();
                                var prefer_district = ''+checkmark+'PREFERS '+district_name+'</br>';
                            }else{
                                var prefer_district = '';
                            }
                            
                            var pastor_id = getdata.user_id;
                            var data_id = getdata.id;
                            //var checkUserList = availableUserList.contains(pastor_id);
                        
                            const findUserList = availableUserList.find((data) => {
                            return data == pastor_id;
                            });

                            if(typeof findUserList !== "undefined")
                            {
                                if(findUserList == pastor_id){
                                    var availability = ''+checkmark+'IS NOT AVAILABLE </br>';
                                    var getAvailableDate = getAvailableDates(pastor_id);
                                    var availabilitylabel = "<label<span>Not Available Dates</span><br>";
                                    var availdatalist = [];
                                    $.each(getAvailableDate.availableData, function (i,getdata){
                                                    availdata = "<span>"+dateformat(getdata['start_date'])+"</span>&nbsp;-&nbsp;<span>"+dateformat(getdata['end_date'])+"</span><br>";
                                                    availdatalist.push(availdata);
                                                           });
                                    let removeComma = () => {
                                        let arr = availdatalist;
                                        return availableValue = arr.join(' ');
                                    };
                                    removeComma();

                                    var availabilityDate = ""+availabilitylabel+availableValue+"</label>";
                                }else{
                                    var availability = "";
                                    var availabilityDate = "";
                                }
                            } else{
                                var availability = "";
                                var availabilityDate = "";
                            }

                            switch (ministry_area) { 
                                case 'within 100 miles of my residence': 
                                    prefers_area  =  checkmark+'PREFERS WITHIN 100 MILES </br>';
                                    break;
                                case 'within 500 miles of my residence': 
                                    prefers_area  =  checkmark+'PREFERS WITHIN 500 MILES </br>';
                                    break;
                                case 'nationally': 
                                    prefers_area  =  checkmark+'PREFERS NATIONALLY </br>';
                                    break;      
                                case 'internationally': 
                                    prefers_area  =  checkmark+'PREFERS INTERNATIONALLY </br>';
                                    break;
                                default:
                                    prefers_area  =  '';
                                    break;
                            }

                            switch (prefer_serve_church) { 
                                case 'in a rural area': 
                                    prefer_serve_church  = checkmark+'PREFERS RURAL AREA </br>';
                                    break;
                                case 'in a small town': 
                                     prefer_serve_church  = checkmark+'PREFERS SMALL TOWN </br>';
                                    break;
                                case 'in a suburban area': 
                                    prefer_serve_church  = checkmark+'PREFERS SUBURBAN AREA </br>';
                                    break;      
                                case 'in the city': 
                                    prefer_serve_church  = checkmark+'PREFERS CITY </br>';
                                    break;
                                default:
                                    prefer_serve_church  =  '';
                                    break;
                            }

                            switch (comfortable_serving_church) { 
                                case '0-100 attendees': 
                                    comfortable_serving_church  =  checkmark+'PREFERS 100 MEMBERS </br>';
                                    break;
                                case '100-500 attendees': 
                                     comfortable_serving_church  =  checkmark+'PREFERS 100-500 MEMBERS </br>';
                                    break;
                                case '500-1000 attendees': 
                                    comfortable_serving_church  =  checkmark+'PREFERS 500-1000 MEMBERS </br>';
                                    break;      
                                case '1000+ attendees': 
                                    comfortable_serving_church  =  checkmark+'PREFERS 1000+ MEMBERS </br>';
                                    break;
                                default:
                                    comfortable_serving_church  =  "";
                                    break;
                            }

                            if(willing_commute == "Y"){
                                willing_commute = checkmark+'WILLING TO COMMUTE </br>';
                            }else{
                                willing_commute = "";
                            }

                            if(language == "Spanish"){
                                language = checkmark+'LANGUAGE KNOWN SPANISH</br>';
                            }else{
                                language = "";
                            }

                            switch (peacemaking) { 
                                case 'Resolving Everyday Conflict': 
                                    peacemaking  =  checkmark+'RESOLVING EVERDAY CONFLICT </br>';
                                    break;
                                case 'Conflict Coaching': 
                                    peacemaking  =  checkmark+'PEACEMAKING CONFLICT COACHING</br>';
                                    break;
                                case 'Mediation': 
                                    peacemaking  =  checkmark+'PEACEMAKING MEDIATION</br>';
                                    break;      
                                case 'Other': 
                                    peacemaking  =  checkmark+'PEACEMAKING OTHER';
                                    break;
                                default:
                                    peacemaking  =  "";
                                    break;
                            }

                            if(onsite_arrangement == "Y"){
                                willing_move = checkmark+'WILLING TO MOVE </br>';
                            }else{
                                willing_move = "";
                            } 

                            if(churchlatlong != ""){
                                var lat1 = churchlatlong.lat1;
                                var lon1 = churchlatlong.lon1;
                                var lat2 = getdata.latitude;
                                var lon2 = getdata.longitude;
                                var miledata = getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2);
                                var mileval = parseInt(miledata);
                            }

                            if(getdata.title != null){
                                title = getdata.title+'. &nbsp;';
                            }else{
                                title = '';
                            }

                            var str = getdata.home_address;
                            var res =  str.split(",");

                            var street1 = res[0]+',';
                            if(res[1] != ''){ 
                                var street2 = res[1]+',';
                            }else{
                                var street2 = '';
                            }
                            var city = res[2]+',';
                            var state = res[3]+',';
                            var country = res[4]+',';
                            var zip = res[5]+'.';

                            name = '<strong><label id="name">'+title+getdata.first_name+' '+getdata.last_name+'</label></strong><br>';

                            address = '<label>'+street1+street2+city+'<br>'+state+country+zip+'</label><br>';

                            if(mileval != undefined){
                               mile = '<label>Distance from church : '+mileval+' Miles</label><br>'; 
                            }else{
                                mile = '';                    
                            }

                            var pastorassigndata = assignedpastordata(getdata.user_id);

                            if(pastorassigndata['placeddata'] != null){
                                Placed = pastorassigndata['placeddata'];
                                assign_start_date = dateformat(Placed['assign_start_date']);  
                                assign_end_date = dateformat(Placed['assign_end_date']);

                                pastorplacedata = "<label style='color:green;'>(Placed)</label><br><label><span>"+Placed['church_name']+"</span><br><span>"+assign_start_date+"</span>&nbsp;-&nbsp;<span>"+assign_end_date+"</span></label>";
                                $(".viewassign"+pastor_id+"").attr('style','display:none');
                                
                            }else if(pastorassigndata['futureplaceddata'] != null){
                                futurePlaced = pastorassigndata['futureplaceddata'];
                                assign_start_date = dateformat(futurePlaced['assign_start_date']);  
                                assign_end_date = dateformat(futurePlaced['assign_end_date']);

                                pastorplacedata = "<label style='color:green;'>(Future Placed)</label><br><label><span>"+futurePlaced['church_name']+"</span><br><span>"+assign_start_date+"</span>&nbsp;-&nbsp;<span>"+assign_end_date+"</span></label>";
                                $(".viewassign"+pastor_id+"").attr('style','display:none');

                            }else{
                                pastorplacedata = "";
                            }
                            
                            preference = '<label class="preference" style="font-size:12px">'+prefers_area+''+availability+''+willing_commute+''+willing_move+''+peacemaking+''+prefer_serve_church+''+prefer_district+''+comfortable_serving_church+language+'</label>';

                            user_id = "<input type='hidden' name='pastor_id"+pastor_id+"' id='pastor_id"+pastor_id+"' value='"+getdata.user_id+"'>";

                            $("#pastordatasection").removeAttr("style");
                            $("#pastordata").append('<div class="row"><div class="col-sm-1" align="center"><input class="form-check-input" type="checkbox" name="export" id="export" value="'+pastor_id+'"></div><div class="col-sm-5 datarecords">'+name+address+mile+preference+'</div><div class="col-md-3" id="assignfield'+pastor_id+'">'+pastorplacedata+"<br>"+availabilityDate+'</div>'+user_id+'<div class="col-sm-3"><div class="text-center"><button class="viewbtn" id="pastorview" data-id="'+getdata['id']+'" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button>&nbsp;<button class="viewcomment" id="pastorcomment" data-id="'+pastor_id+'" data-toggle="tooltip" title="Message"><i class="fa fa-comment"></i></button>&nbsp;<button class="viewassign'+pastor_id+'" id="pastorassign" data-id="'+pastor_id+'" data-toggle="tooltip" title="Assign"><a><i class="fa fa-user-plus"></i></a></button><button class="editassign'+pastor_id+'" id="editassign" data-id="'+pastor_id+'" data-toggle="tooltip" title="Edit Assign" style="display:none"><i class="fa fa-edit"></i></button></div></div></div><br>');
                            $('[data-toggle="tooltip"]').tooltip();

                            // var usertypeid = "{{$isUSER}}";

                            // if(usertypeid == "ds"){
                            //    $('button.viewcomment').hide(); 
                            // }

                            if(pastorassigndata['placeddata'] != null){

                                $(".viewassign"+pastor_id+"").attr('style','display:none');
                                $(".editassign"+pastor_id+"").removeAttr('style');
                                
                            }else if(pastorassigndata['futureplaceddata'] != null){

                                $(".viewassign"+pastor_id+"").removeAttr('style');
                                $(".editassign"+pastor_id+"").attr('style','display:none');

                            }

                        });
                    }
                }
            },
            complete:function(response){
                // Hide image container
                $("#loader").hide();
                $("#success").show();
           },
        });
    };

    function pastorapplicationview(data){ 
        var data = {'id' : data};
        $.ajax({
            method : "get",
            url: "{{ route('dsviewofcandidate')}}",
            data : data,
            success: function(response) {
                window.open(response.success);
            },
        });
    }

    function getAvailableDates(data){ 
        var result;
        var data = {'id' : data};
        $.ajax({
            method : "get",
            url: "{{ route('getAvailableDates')}}",
            data : data,
            async: false,
            success: function(response) {
                result = response;
            },
        });
        return result;
    }

    function getdistrict(dist_id){
       var result;
        var district_id = dist_id;
        data = {'dist_id' : district_id};  
        $.ajax({
            method : "get",
            url: "{{ route('getdistrict') }}",
            data : data,
            async: false,
            success: function(response) {
            result = response;
            },
        });
      return result;
    }


    function assignedpastordata(pastorid){
        var pastorassigndata;
        var data = {'pastorid' : pastorid};
        $.ajax({
            method : "get",
            url: "{{Route('assignedpastordata')}}",
            data : data,
            async: false,
            success: function(response) {
              pastorassigndata = response;
            }
        });
        return pastorassigndata;
    }

    function dateformat(userDate){
        var formattedDate = new Date(userDate);
        var day = formattedDate.getDate();
        dayVal =  day < 10 ? '0' + day : day;
        var month =  formattedDate.getMonth();
        month += 1;
        monthVal = month < 10 ? '0' + month : month;
        var yrVal = formattedDate.getFullYear();
        newDate = monthVal + '-' + dayVal + '-' + yrVal;
        return newDate;
    }

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
        var radius = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1); 
        var a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var distance = radius * c; // Distance in km
        var miles = distance * 0.62137; // d *  0.62137 for miles
        return miles;
    }

    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }

    function exportCSV(arr) {
        var data = id = {arr};
        var url = "{{ Route('exportXlxs') }}";
        $.ajax({
            method : "get",
            url: url,
            data : data,
            success: function(response) {
                var a = document.createElement('a');
                var url = "{{asset('files/Candidate list.csv')}}";
                a.href = url;
                a.download = 'Candidate list.csv';
                document.body.append(a);
                a.click();
                a.remove();
                $('#assignedsuccess').attr('style','display:none');
                $('#updatesuccess').attr('style','display:none');
                $("#exportsuccess").removeAttr('style');
            }
        });
    }

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
                    $("#exportsuccess").attr('style','display:none');
                    $("#assignedsuccess").removeAttr('style');

                }
                if(response.success == "update success"){
                    $("#exportsuccess").attr('style','display:none');
                    $("#updatesuccess").removeAttr('style');
                }
                $(".viewassign"+pastor_id+"").attr('style','display:none');
                $(".editassign"+pastor_id+"").removeAttr('style');
                if(response.success == "assign success"){
                    $("div#assignfield"+pastor_id+"").empty().append("<label style='color:green;'>(Placed)</label><br><span>"+response.data['church_name']+"</span><br><span>"+response.data['assign_start_date']+"</span>&nbsp;-&nbsp;<span>"+response.data['assign_end_date']+"</span>");
                }
                if(response.success == "update success"){
                    $("div#assignfield"+pastor_id+"").empty().append("<label style='color:green;'>(Placed)</label><br><span>"+response.data['church_name']+"</span><br><span>"+response.data['assign_start_date']+"</span>&nbsp;-&nbsp;<span>"+response.data['assign_end_date']+"</span>");
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
            }
        });
    }    
});

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

 
@endsection