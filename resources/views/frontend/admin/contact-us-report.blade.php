@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;

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
            <label><h4 class="align-middle">Contact Us Report</h4></label>
        </div>         
        <br>
      </div>
    </nav>
      
    <table id="reporttable" class="table table-hover responsive data-table" style="width:100%;font-size:15px">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Submitted Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($contactusreportlist as $value)
                <tr id="user_row{{$value['id']}}">
                    <td>{{ $value["name"] }}</td>
                    <td><a href="mailto: {{ $value['email'] }}" data-toggle="tooltip" title="mailto: {{ $value['email'] }}">{{ $value["email"] }}</a></td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('m-d-Y') }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-8">
                                <button id="reportview" data-id="{{$value['id']}}" style="padding: 0 8px 0 0;background:none;color:#801214;">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="Report View"></i>
                                </button>
                                <button id="reportdelete" data-id="{{$value['id']}}" style="padding: 0 8px 0 0;background:none;color:#801214;">
                                    <i class="fas fa-trash" data-toggle="tooltip" title="Report Delete"></i>
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
  <!-- Modal -->
  <div class="modal" id="myActiveModal" >
  <div class="modal-dialog modal-lg modal-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#801214;color: #fff;">
        <h4>View Report</h4>
        <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
      </div>
      <form id="pastorActiveForm">                                                      
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="label-name">Name</label>
                <input class="form-control" type="text" name="name" id="report-name" value="" disabled="disabled">
            </div>
            <div class="form-group col-md-6">
                <label class="label-name">Email</label>
                <input class="form-control" type="text" name="email" id="report-email" value="" disabled="disabled">      
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="label-name">Subject</label>
                 <input class="form-control" type="text" name="subject" id="report-subject" value="" disabled="disabled">      
            </div>
        </div>
        <div class="row comment-section">
            <div class="form-group col-md-12">
                <label class="label-name">Message</label>
                <textarea class="form-control" name="comment" id="report-comment" maxlength="255" disabled="disabled"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModal" type="button" >{!! trans('main.close') !!}</button>
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
              <label class="label-name" style="font-size:20px">Are you sure you want to delete?</label>
              <input type="hidden" name="id" id="del-user-id" value="">
            </div>
          </div>
          <div class="modal-footer" style="height: 50px;">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="DelBtn" style="background-color: #801214;color:#fff;" >Yes</button>
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

    $("button#reportview").click(function() {
        var id = $(this).attr('data-id');
        $('#myActiveModal').appendTo("body").modal('toggle');
        getreportdata(id);
    });

    $("#closeModal").click(function() {
        $('#myActiveModal').modal('hide');
        $('#pastorAssignForm').trigger("reset");
    });
    $("#CloseModal").click(function() {
        $('#myActiveModal').modal('hide');
        $('#pastorAssignForm').trigger("reset");
    });

    $("button#reportdelete").click(function() {
        var id = $(this).attr('data-id');
        $('#myModalDel').appendTo("body").modal('toggle');
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

    $("#DelBtn").click(function(e) {
        e.preventDefault();
        var id = $('#del-user-id').val();
        deletereportdata(id);
    });

    function getreportdata(id){
        
        data = {'id':id};
        $.ajax({
        method : "get",
        url: "{{ route('getreportdata') }}",
        async: false,
        data : data,
            success: function(response) { 
                var data = response.success;
                $('#report-name').val(data.name);
                $('#report-email').val(data.email);
                $('#report-comment').val(data.message);
                $('#report-subject').val(data.subject);
            }
        });

    }

    function deletereportdata(id){
        data = {'id' : id};
        $.ajax({
            method : "get",
            url: "{{ route('deletereport') }}",
            data : data,
             async: false,
            success: function(response) {
                 $('#myModalDel').modal('hide');
                 swal("Success!", "Record Deleted Successfully", "success"); 
                $('#user_row'+response.data+'').remove();  
            },
        });
        debugger; 
    }

    $(document).ready(function() {

        $("#reporttable").DataTable({
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