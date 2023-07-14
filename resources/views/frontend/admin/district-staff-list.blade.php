@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;

$id = auth()->id();
$isUSER = ATMNHelper::isUSER();                    
@endphp

<style type="text/css">
    .user-type:hover{
        text-decoration: underline;
        cursor: pointer;
    }
    .user-status:hover{
        text-decoration: underline;
        cursor: pointer;
    }
    i.fa-info-circle{
        font-size: 12px;
    }
    #error-comment{
        color: red;
    }
</style>

<div class="col-md-9" id="bri_ind_container">
<div class="php-email-form" >
    
    <!-- Navbar -->
    <nav id="navbar" class="flexbox profile-nav">
      <!-- Navbar Inner -->
      <div class="navbar-inner view-width flexbox-space-bet">
        <div class="row bar">
            <label><h4 class="align-middle">District Staff List</h4></label>
        </div>         
        <br>
      </div>
    </nav>

   <div class="row">
        <div class="col-md-12" style="font-size:14px">
            <div class="alert alert-success" id="success" style="display: none;">
                Pastor Account Activated Successfully
                <div style="float:right;margin-top: -5px;">
                    <button type="button" id="close" class="close">&times;</button>
                </div>
            </div>
            <div class="alert alert-danger" id="Success" style="display: none;">
                Pastor Account Inactive Successfully
                <div style="float:right;margin-top: -5px;">
                    <button type="button" id="Close" class="close">&times;</button>
                </div>
            </div>
        </div>
    </div>
      
    <table id="district" class="table table-hover responsive data-table" style="width:100%;font-size:15px">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>District</th>
            <th style="width:60px">Status</th>
            <!-- <th>Register Date</th>
            <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
            @foreach($districtstafflist as $value)
            @php
            
                if($value['user_type'] == 'admin'){
                    $user_type = 'Admin';
                }
                elseif($value['user_type'] == 'ds'){
                    $user_type = 'D.S. or N.O.';
                }
                else{
                    $user_type = 'Pastor';
                }
                $allowshow = ATMNHelper::getatmndata(@$value['id']);
            @endphp
                <tr id="user_row{{$value['id']}}">
                    @if($user_type == 'D.S. or N.O.' || $user_type == 'Admin' || $allowshow == "allow")
                    <td>
                        <a href="{{route('admin.user.profile.show',array(ATMNHelper::encryptUrl(@$value['id'])))}}">{{ $value["username"] }}</a>
                    </td>
                    @else
                    <td>
                        <a href="{{route('admin.app.user.show',array(ATMNHelper::encryptUrl(@$value['id'])))}}">{{ $value["username"] }}</a>
                    </td>
                    @endif
                    <td>
                        <a href="mailto: {{ $value['email'] }}">{{ $value["email"] }}</a>
                    </td>
                    
                    <td>
                        @if($value['district_id'] == "National Office")
                        <label id="mybtn" data-id="{{$value['id']}}" data-toggle="tooltip" title="Assign Role">
                            <span  class="user-type" id="user_type{{$value['id']}}" style="color:#801214">National Office</span>
                        </label>
                        @else
                        <label id="mybtn" data-id="{{$value['id']}}" data-toggle="tooltip" title="Assign Role">
                            <span  class="user-type" id="user_type{{$value['id']}}" style="color:#801214">{{ATMNHelper::getdistrictname($value['district_id'])}}</span>
                        </label>
                        @endif
                    </td>

                    <input type="hidden" name="status" id="status" value="{{ $value['status'] }}">
                    <td>
                        <label class="active user-status" id="active{{$value['id']}}" data-id="{{$value['id']}}" @if($value["status"] == "Inactive") style="display:none" @endif style="color: green;" data-toggle="tooltip" title="Inactivate">Active</label>
                        <label class="inactive user-status" id="inactive{{$value['id']}}" data-id="{{$value['id']}}" @if($value["status"] == "Active") style="display:none" @endif style="color: red;" data-toggle="tooltip" title="Activate">Inactive </label> 
                        <i class="fa fa-info-circle" id="inactiveicon{{$value['id']}}" @if($value["status"] == "Active") style="display:none" @endif data-toggle="tooltip" 
                            title="{!! ATMNHelper::getuserstatus(@$value['id']) !!}"></i>
                    </td>
                    <!-- 
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('m-d-Y') }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-8">
                                <button id="myDel" data-id="{{$value['id']}}" style="background:none;color:#801214;padding:0 0 0 0"><i class="fa fa-trash" data-toggle="tooltip" title="Delete User"></i></button>
                            </div>
                        </div>
                        
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="container">
      <!-- Modal -->
      <div class="modal" id="myModal" >
      <div class="modal-dialog modal-md modal-centered">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4>Assign Role</h4>
            <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="pastorAssignForm">                                                      
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">Name</label>
                <input class="form-control name" type="text" name="name" id="pastorname" value="" disabled="disabled">
                <input type="hidden" name="user_id" value="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">Role</label>
                <select class="form-select" name="user_type" id="user_type">
                    <option value="">Pastor</option>
                    <option value="ds">D.S. or N.O.</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="hidden" name="id" id="user_id" value="">
              </div>
            </div>
            <div class="row district-section" style="display: none;">
              <div class="form-group col-md-12">
                <label class="label-name">District</label>
                <select class="form-select" name="district_id" id="district_id">
                    <option value="">Select District</option>
                    @foreach($district as $value)
                    <option value="{{ $value->d_id }}">{{ $value->district }}</option>
                    @endforeach
                    <option value="National Office">National Office</option>
                </select>
                <span class="error-district" id="error-select-district" style="display: none;">Please Select District</span>
                <input type="hidden" name="id" id="user_id" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="pastorAssignBtn" >{!! trans('main.assign') !!}</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModal" type="button" >{!! trans('main.close') !!}</button>
          </div>
        </form>
      </div>

      </div>
      </div>
    </div>

    <div class="container">
      <!-- Modal -->
      <div class="modal" id="myActiveModal" >
      <div class="modal-dialog modal-md modal-centered">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4>User Status</h4>
            <button type="button" id="CloseActiveModal" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="pastorActiveForm">                                                      
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">Name</label>
                <input class="form-control name" type="text" name="name" id="username" value="" disabled="disabled">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">Status</label>
                <select class="form-select" name="status" id="user_status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <input type="hidden" name="id" id="user_id" value="">
              </div>
            </div>
            <div class="row comment-section" style="display: none;">
              <div class="form-group col-md-12">
                <label class="label-name">Comments</label>
                <textarea class="form-control" name="comment" id="comment" maxlength="255"></textarea>
                <span class="error-comment" id="error-comment" style="display: none;">Please Enter Comment</span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="pastorActiveBtn" style="display: none">{!! trans('main.submit') !!}</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeActiveModal" type="button" >{!! trans('main.close') !!}</button>
          </div>
        </form>
      </div>

      </div>
      </div>
    </div>

    <div class="container">
      <!-- Delete Modal -->
      <div class="modal" id="myModalDel" >
      <div class="modal-dialog modal-md modal-centered">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4>Delete</h4>
            <button type="button" id="CloseModalDel" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="myAvailableDel">                                                      
          <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label class="label-name" style="font-size:20px">Are you sure you want to delete <strong><span id="del-user-name"></span>'s</strong> record?</label>
              <input type="hidden" name="id" id="del-user-id" value="">
            </div>
          </div>
          <div class="modal-footer" style="height: 50px;">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="userDelBtn" style="background-color: #801214;color:#fff;" >Yes</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModalDel" type="button" style="background-color: #801214;color:#fff;" >
            No</button>
          </div>
          </div>
        </form>
      </div>
      </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script type="text/javascript">


    $('.active').click(function(){ 
        var data = $(this).attr('data-id');
        userStatus(data);
    });

    $('.inactive').click(function(){ 
        var data = $(this).attr('data-id');
        userStatus(data);
    });

    $("label#mybtn").click(function() {
        $('#error-district').attr('style','display:none');
        $('#pastorAssignBtn').removeAttr('disabled');
        $('#pastorAssignForm').trigger("reset");
        var user_id = $(this).attr('data-id');
        usertype(user_id);
    });

    $("#closeModal").click(function() {
      $('#myModal').modal('hide');
      $('#pastorAssignForm').trigger("reset");
    });
    $("#CloseModal").click(function() {
        $('#myModal').modal('hide');
        $('#pastorAssignForm').trigger("reset");
    });

    /*------- end pastorAssignForm toggle close -------*/

    /*------- User Del toggle close -------*/

    $("button#myDel").click(function() {
        var id = $(this).attr('data-id');
        $('#myModalDel').appendTo("body").modal('toggle');
        $('#del-user-id').val(id);
        $("#del-user-name").append(''+getnameuser(id)+'');
    });

    $("#closeModalDel").click(function() {
        $('#myModalDel').modal('hide');
        $("#del-user-name").empty();
    });
    $("#CloseModalDel").click(function() {
        $('#myModalDel').modal('hide'); 
        $("#del-user-name").empty();
    });

    $("#closeActiveModal").click(function() {
        $('#pastorActiveBtn').attr('style','display:none');
        $('#myActiveModal').modal('hide');
    });
    $("#CloseActiveModal").click(function() {
        $('#pastorActiveBtn').attr('style','display:none');
        $('#myActiveModal').modal('hide'); 
    });

    $("#close").click(function() {
        $('#success').attr('style','display:none');
    });
    $("#Close").click(function() {
        $('#Success').attr('style','display:none');
    });

    var activestatus = $("#status").val();

    if(activestatus == 'Active'){
        $('#activestatus').removeAttr('style');
    }else{
        $('#inactivestatus').removeAttr('style');
    }

    $('#user_type').on('change',function() {
        let user_type = $('#user_type').val();
        if(user_type == "ds"){  
            $('.district-section').removeAttr('style');
        }else{
            $('.district-section').attr('style','display:none');
        }
    });

    $('#user_status').on('change',function() {
        let user_status = $('#user_status').val();
        if(user_status == "Inactive"){
            $('#pastorActiveBtn').removeAttr('style');
            $('.comment-section').removeAttr('style');
        }else{
            $('#pastorActiveBtn').removeAttr('style');
            $('.comment-section').attr('style','display:none');
        }
    });

    $('#district_id').on('change',function() {
        $('#error-select-district').attr('style','display:none');
        let district_id = $('#district_id').val();
        if(district_id != ""){
            data = {'district_id':district_id};
            $.ajax({
            method : "get",
            url: "{{ route('currentdistrictpastor') }}",
            async: false,
            data : data,
                success: function(response) {               
                    if(response.success == 'already exists'){
                        var district = getdistrict(response.district.district_id);
                        $('#error-select-district').attr('style','display:none');
                        $('#pastorAssignBtn').removeAttr('disabled','disabled');
                    }else{
                        $('#error-select-district').attr('style','display:none');
                        $('#pastorAssignBtn').removeAttr('disabled','disabled');
                    }
                }
            });
        }else{
            $('#error-select-district').removeAttr('style');
            $('#pastorAssignBtn').attr('disabled','disabled');
        }
    });


    $('#userDelBtn').click(function(e) {
        e.preventDefault();
        var $id = $('#del-user-id').val();
        userdelete($id);
    });

    function userdelete(id){
        data = {'id' : id};
        $.ajax({
            method : "get",
            url: "{{ route('deleteuser') }}",
            data : data,
            async: false,
            success: function(response) {
                var username = namecaptalize(response.data.username);
                $("#del-user-name").empty();
                $('#myModalDel').modal('hide');
                $('#user_row'+response.data.id+'').remove();
                swal("Success!", ""+username+" record deleted successfully", "success");
            },
        });
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

    $("#pastorAssignBtn").click(function(e) {
       e.preventDefault();
        var id = $('input[name="id"][id="user_id"]').val();
        var user_type = $('#user_type').val();
        var district_id = $('#district_id').val();

        if(user_type == 'ds'){
            if(district_id == ""){
                dist_data = false;
                $('#error-select-district').removeAttr('style');
                $('#pastorAssignBtn').attr('disabled','disabled');
            }else{
                var data = {"_token": "{{ csrf_token() }}",'id':id , 'user_type':user_type ,'district_id':district_id};
                pastorassign(data);
            }
        }else{
            dist_data = true;
            $('#error-select-district').attr('style','display:none');
            $('#pastorAssignBtn').removeAttr('disabled');
            var data = {"_token": "{{ csrf_token() }}",'id':id , 'user_type':user_type ,'district_id':district_id};
            pastorassign(data);
        }
    });

    $("#pastorActiveBtn").click(function(e) {
       e.preventDefault();
        var id = $('input[name="id"][id="user_id"]').val();
        var user_status = $('#user_status').val();
        

        if(user_status == 'Inactive'){
            var comment = $('#comment').val();
            if(comment == ""){
                $('#error-comment').removeAttr('style');
            }else{
                $('#error-comment').attr('style','display:none');
                var data = {"_token": "{{ csrf_token() }}",'id':id , 'user_status':user_status ,'comment':comment};
                userStatusUpdate(data);
            }
        }else{
            var comment = '';
            $('#error-comment').attr('style','display:none');
            $('#pastorAssignBtn').removeAttr('disabled');
            var data = {"_token": "{{ csrf_token() }}",'id':id , 'user_status':user_status ,'comment':comment};
            userStatusUpdate(data);
        }
    });

    function pastorassign(data){
        $.ajax({
            method : "post",
            url: "{{ route('roleassign') }}",
            async: false,
            data : data,
            success: function(response) {
                var username  = namecaptalize(response.data.username);
                if(response.data.user_type == 'admin'){
                    user_type = 'Admin';
                    $('#requestforstaff').hide();
                }else if(response.data.user_type == 'ds'){
                    user_type = 'D.S. or N.O.';
                    $('#requestforstaff').hide();
                }else{
                    user_type = 'Pastor';
                }
                $('#user_type'+response.data.id+'').empty().append(user_type);
                // $('#user_type'+response.data.id+'').val(user_type)
                $('.district-section').attr('style','display:none');
                $('#myModal').trigger("reset");
                $('#myModal').modal('hide');
                swal("Success!", " "+username+" role assign successfully", "success");
            }
        });
    }

    function userStatusUpdate(data){
        $.ajax({
            method : "post",
            url: "{{ route('userstatusupdate') }}",
            async: false,
            data : data,
            success: function(response) {
                console.log(response);
                var id = response.data.id;                
                var val = response.data.id+response.data.status;
                var username = namecaptalize(response.data.username);

                if( response.data.status == "Active"){
                    $('#myActiveModal').modal('hide');
                    swal("Success!", ""+username+" account activated successfully!", "success");
                    $("#active"+id+"").removeAttr('style');
                    $("#active"+id+"").attr('style','color:green');
                    $("#inactive"+id+"").attr('style','display:none');
                    $("#inactiveicon"+id+"").attr('style','display:none');
                    $("#inactiveicon"+id+"").removeAttr('data-bs-original-title').removeAttr('aria-label');
                    $('#user_status option[value="Active"]').removeAttr('selected');
                    $('#user_status option[value="Inactive"]').removeAttr('selected');
                }
                if( response.data.status == "Inactive"){ 
                    let getuserstatus = getstatus(id);
                    // alert(getuserstatus);
                    $('#myActiveModal').modal('hide');
                    swal("Success!", ""+username+" account inactivated successfully!", "success");
                    $("#active"+id+"").attr('style','display:none');
                    $("#inactive"+id+"").removeAttr('style');
                    $("#inactive"+id+"").attr('style','color:red');
                    $("#inactiveicon"+id+"").removeAttr('style').removeAttr('data-bs-original-title').removeAttr('aria-label');
                    $("#inactiveicon"+id+"").attr("data-bs-original-title",""+getuserstatus+"").attr("aria-label",""+getuserstatus+"");
                    $('#user_status option[value="Active"]').removeAttr('selected');
                    $('#user_status option[value="Inactive"]').removeAttr('selected');
                }
            }
        });
    }

    function usertype(user_id){
       var data = {'id':user_id};
        $.ajax({
        method : "get",
        url: "{{ route('getusertype') }}",
        async: false,
        data : data,
            success: function(response) {
                user_type = response.success[0].user_type;
                id = response.success[0].id;
                name = response.success[0].username;
                district_id = response.success[0].district_id;

                $('#user_type option[value="ds"]').attr('selected',false);
                $('#user_type option[value="admin"]').attr('selected',false);
                $('#user_type option[value=""]').attr('selected',false);

                $('#myModal').appendTo("body").modal('toggle');
                $('#pastorAssignForm').trigger("reset");
                $('input[name="name"][id="pastorname"]').val(name);
                $('input[name="id"][id="user_id"]').val(id);

                if(user_type == 'ds'){
                    $('#user_type option[value="ds"]').attr('selected',true);
                    $('.district-section').removeAttr('style');
                    $('#district_id option[value="'+district_id+'"]').attr('selected',true);
                }else if(user_type == 'admin'){
                    $('#user_type option[value="admin"]').attr('selected',true);
                    $('.district-section').attr('style','display:none');
                }else{
                    $('#user_type option[value=""]').attr('selected',true);
                    $('.district-section').attr('style','display:none');
                } 
            }
        }); 
    }

    function getstatus(id){
        data = {'id':id};
       var result;
        $.ajax({
        method : "get",
        url: "{{ route('getstatus') }}",
        async: false,
        data : data,
            success: function(response) {
                result = response.data;
            }
        });
        return result;
    }

    function userStatus(user_id){
       var data = {'id':user_id};
        $.ajax({
        method : "get",
        url: "{{ route('getuserstatus') }}",
        async: false,
        data : data,
            success: function(response) {
                user_status = response.success.user_type;
                id = response.success.id;
                name = response.success.username;
                active_status = response.success.status;
                comment = response.data;

                $('#user_status option[value="Active"]').attr('selected',false);
                $('#user_status option[value="Inactive"]').attr('selected',false);

                $('#myActiveModal').appendTo("body").modal('toggle');
                $('#pastorActiveForm').trigger("reset");

                $('input[name="name"][id="username"]').val(name);
                $('input[name="id"][id="user_id"]').val(id);

                if(active_status == 'Active'){
                    $('#user_status option[value="Active"]').attr('selected',true);
                    $('.comment-section').attr('style','display:none');
                }else{
                    $('#user_status option[value="Inactive"]').attr('selected',true);
                    $('.comment-section').removeAttr('style');
                    $('#comment').val(comment);
                } 
            }
        }); 
    }

    $(document).ready(function() {

        $("#district").DataTable({
            aaSorting: [],
            "iDisplayLength": 10,
            "aLengthMenu": [[10, -1], [10, "All"]],
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

        $('[data-toggle="tooltip"]').tooltip();

    });

</script>

@endsection