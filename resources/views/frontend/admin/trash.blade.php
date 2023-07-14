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
        text-decoration: underline
    }
    .user-status:hover{
        text-decoration: underline
    }
</style>

<div class="col-md-9" id="bri_ind_container">
<div class="php-email-form" >
    
    <!-- Navbar -->
    <nav id="navbar" class="flexbox profile-nav">
      <!-- Navbar Inner -->
      <div class="navbar-inner view-width flexbox-space-bet">
        <div class="row bar">
            <label><h4 class="align-middle">Restore User</h4></label>
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
      
    <table id="trashtable" class="table table-hover responsive data-table" style="width:100%;font-size:15px">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Register Date</th>
            <th>Delete Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($trashuserslist as $value)
            @php
                if($value['user_type'] == 'admin'){
                    $user_type = 'Admin';
                }
                elseif($value['user_type'] == 'ds'){
                    $user_type = 'DS';
                }
                else{
                    $user_type = 'Pastor';
                }
                $allowshow = ATMNHelper::getatmndata(@$value['id']);
            @endphp
                <tr id="user_row{{$value['original_id']}}">
                    <td>{{ $value["username"] }}</td>
                    <td><a href="mailto: {{ $value['email'] }}">{{ $value["email"] }}</a></td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_date)->format('m-d-Y') }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('m-d-Y') }}</td>
                    <td width="30px">
                        <div class="row">
                            <div class="col">
                                <button id="myRestore" data-id="{{$value['original_id']}}" style="padding: 0 8px 0 0;background:none;color:#801214;">
                                    <i class="fas fa-trash-restore" data-toggle="tooltip" title="Restore User"></i>
                                </button>
                                <button id="myDel" data-id="{{$value['original_id']}}" style="padding: 0 8px 0 0;background:none;color:#801214;">
                                    <i class="fas fa-trash" data-toggle="tooltip" title="Permanent Delete"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="container">
      <!-- Delete Modal -->
      <div class="modal" id="myModalRestore" >
      <div class="modal-dialog modal-md modal-centered">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4>Restore</h4>
            <button type="button" id="CloseModalRestore" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="myAvailableDel">                                                      
          <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label class="label-name" style="font-size:20px">Are you sure you want to Restore <strong><span id="restore-user-name"></span>'s</strong> record?</label>
              <input type="hidden" name="id" id="restore-user-id" value="">
            </div>
          </div>
          <div class="modal-footer" style="height: 50px;">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="userRestoreBtn" style="background-color: #801214;color:#fff;" >Yes</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModalRestore" type="button" style="background-color: #801214;color:#fff;" >
            No</button>
          </div>
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

    /*------- User Resto toggle close -------*/

    $("button#myRestore").click(function() {
        var id = $(this).attr('data-id');
        $('#myModalRestore').appendTo("body").modal('toggle');
        $("#restore-user-name").append(''+getnameuser(id)+'');
        $('#restore-user-id').val(id);
        console.log(getnameuser(id));
        
    });

    $("#closeModalRestore").click(function() {
        $('#myModalRestore').modal('hide');
        $("#restore-user-name").empty();
    });
    $("#CloseModalRestore").click(function() {
        $('#myModalRestore').modal('hide'); 
        $("#restore-user-name").empty();
    });

    $('#userRestoreBtn').click(function(e) {
        e.preventDefault();
        var $id = $('#restore-user-id').val();
        userrestore($id);
    });


    /*------- User Del toggle close -------*/

    $("button#myDel").click(function() {
        var id = $(this).attr('data-id');
        $('#myModalDel').appendTo("body").modal('toggle');
        $("#del-user-name").append(''+getnameuser(id)+'');
        $('#del-user-id').val(id);
    });

    $("#closeModalDel").click(function() {
        $('#myModalDel').modal('hide');
        $("#del-user-name").empty();
    });

    $("#CloseModalDel").click(function() {
        $('#myModalDel').modal('hide');
        $("#del-user-name").empty(); 
    });

    $('#userDelBtn').click(function(e) {
        e.preventDefault();
        var id = $('#del-user-id').val();
        permanentdelete(id);
    });


    $("#close").click(function() {
        $('#success').attr('style','display:none');
    });
    $("#Close").click(function() {
        $('#Success').attr('style','display:none');
    });

    function userrestore(id){
        data = {'id' : id};
        $.ajax({
            method : "get",
            url: "{{ route('restoreuser') }}",
            data : data,
            async: false,
            success: function(response) {
                var username = namecaptalize(response.username);
                $('#myModalRestore').modal('hide');
                $("#restore-user-name").empty();
                if(response.success == "success"){
                    $('#user_row'+response.data+'').remove();
                    swal("Success!", ""+username+" record restored successfully", "success");
                }else{
                    swal("Warning!", "You cannot restore the user because it is already exist","warning");
                } 
            },
        });
    }

    function permanentdelete(id){
        data = {'id' : id};
        $.ajax({
            method : "get",
            url: "{{ route('permanentdelete') }}",
            data : data,
            async: false,
            success: function(response) { 
                $('#myModalDel').modal('hide');
                $("#del-user-name").empty();
                if(response.success == "success"){
                    $('#user_row'+response.data+'').remove();
                    swal("Success!", "User record permanently deleted successfully", "success");
                }else{
                    swal("Success!", "User record coudn't deleted ","warning");
                }
                
            },
        });
    }


    $(document).ready(function() {

        $("#trashtable").DataTable({
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