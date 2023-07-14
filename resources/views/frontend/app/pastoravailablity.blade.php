@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;

$isUSER = ATMNHelper::isUSER();
@endphp
@php 
if(empty($atmn->status)){
    $status = "";
}else{
    $status = $atmn->status;
}
@endphp

<div class="col-md-9" id="bri_ind_container">
<div class="php-email-form">
   @if (session('success'))
   <div class="alert alert-success" id="success">
      {{ session('success') }}
   </div>
   @endif

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <!-- Navbar -->
    <nav id="navbar" class="flexbox profile-nav">
      <!-- Navbar Inner -->
      <div class="navbar-inner view-width flexbox-space-bet">
        <div class="row align-middle">
            <h4 class="align-middle">
                Availability
            </h4>
        </div>         
        <br>
      </div>
    </nav>
      
    <table id="example" class="table table-hover responsive" style="width:100%">
        <thead>
          <tr>
            <th>Start Date</th>
            <th>Projected End Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($UnAvailable as $value)
            <tr>
                <td>
                    {{ $value->start_date }}
                </td>
                <td>
                    {{ $value->end_date }}
                </td>
                <td>
                    <a href="javascript:void(0)" data-toggle="tooltip" class="myBtnshow" id="myBtnshow{{$value->id}}" data-id="{{$value->id}}" data-original-title="view"><i class="fa fa-eye"></i></a>
                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" class="myBtnedit" id="myBtnedit{{$value->id}}" data-id="{{$value->id}}" data-original-title="edit"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" class="myBtndel"  id="myBtndel{{$value->id}}"  data-id="{{$value->id}}" data-original-title="Delete"><i class="fa fa-trash"></i></a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="container">
      <!-- Modal -->
      <div class="modal" id="myModal" >
      <div class="modal-dialog modal-lg modal-centered">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4><span id="AddSpan">Add </span><span id="EditSpan">Edit </span>Not Available Dates and Reason</h4>
            <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="myAvailableForm">                                                      
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="label-name">{!! trans('main.user.startdate') !!} <span class="astrict">*</span></label>
                <input type="date" name="start_date" class="form-control" id="start_date"  value="{{ $start_date ?? '' }}" >
                @if ($errors->has('start_date'))
                   <span class="help-block">
                      {{ $errors->first('start_date') }}
                   </span>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label class="label-name">Projected End Date <span class="astrict">*</span></label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $end_date ?? '' }}" >
                @if ($errors->has('end_date'))
                   <span class="help-block">
                      {{ $errors->first('end_date') }}
                   </span>
                @endif
              </div>
            </div>
            <input type="hidden" name="type" class="form-control" id="type" value="Personnal" >
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">{!! trans('main.user.reason') !!}</label>
                <textarea name="reason" class="form-control" id="reason">{{ $reason ?? '' }}</textarea>
                @if ($errors->has('reason'))
                   <span class="help-block">
                      {{ $errors->first('reason') }}
                   </span>
                @endif
              </div>
            </div>
          </div>
          <input type="hidden" id="unavailabeid" name="id" value="">
          <div class="modal-footer">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="myAvailableUpdateBtn" >{!! trans('main.update') !!}</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="myAvailableBtn" >{!! trans('main.add') !!}</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModal" type="button" >{!! trans('main.close') !!}</button>
          </div>
        </form>
      </div>

      </div>
      </div>
    </div>

    <div class="container">
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
              <input type="hidden" name="id" id="id" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="myAvailableBtnDel" style="background-color: #801214;color:#fff;" >Yes</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>

// $("#myAvailableForm").validate({
//     rules: {
//       start_date : {
//         required: true,
//       },
//       end_date : {
//         required: true,
//       },
      
//     },
//     messages : {
//       start_date: {
//        required: "Please select start date",
//       },
//       end_date: {
//        required: "Please select end date",
//       },
//     },
//     submitHandler: function(form) {
//     var thisForm = $(form);
//     var formID =  thisForm.attr("id");

//     var availableId = $('#unavailabeid').val();
//     if(availableId == ""){
//       var url ="{{ route('app.pastor.availabe.post') }}";
//     }else{
//       var url ="{{ route('app.pastor.availabe.update') }}";
//     }
//     AtmnWizard(formID, url);
//     }
// });

$('#example').on('click','.myBtn',function() { 
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
   myAvailablityView(id,data);
    $('#myAvailableBtn').show();
    $('#myAvailableUpdateBtn').hide();   
});

$('#example').on('click','.myBtnshow',function() { 
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
    $('#myAvailableUpdateBtn').hide();
    $('#myAvailableBtn').hide();
    $('#EditSpan').hide();
    $("input[name='start_date']").attr("disabled","disabled");
    $("input[name='end_date']").attr("disabled","disabled");
    $("textarea[name='reason']").attr("disabled","disabled");

   myAvailablityView(id,data);
});

$('#example').on('click','.myBtnedit',function() { 
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
    myAvailablityView(id,data);
    $('#myAvailableUpdateBtn').show();
    $('#myAvailableBtn').hide();
});

function myAvailablityView(id,data){
  var id = data; // Address
  var data = {'id' : id};
  $.ajax({
    method : "GET",
    url: "{{ route('app.pastor.availabe.data') }}",
    data : data,
      success: function(response) {
        console.log(response);
        $('#start_date').val(response.unavailabeData['start_date']);
        $('#end_date').val(response.unavailabeData['end_date']);
        $( "#reason" ).empty().val(response.unavailabeData['reason']);
        $( "#unavailabeid" ).empty().val(response.unavailabeData['id']);
      }
   });
  $('#myModal').appendTo("body").modal('toggle');
  $('#AddSpan').hide();
}

$("#myBtn").click(function() {
      $('#myModal').appendTo("body").modal('toggle');
      $('#myAvailableForm').trigger("reset");
      $('#EditSpan').hide();
      $('#myAvailableBtn').show();
      $('#myAvailableUpdateBtn').hide();

  });
  $("#closeModal").click(function() {
      $('#myModal').modal('hide');
      $('#myAvailableForm').trigger("reset");
      $('#AddSpan').show();
      $('#EditSpan').show();
      $("input").removeAttr("disabled","disabled");
      $("textarea").removeAttr("disabled","disabled");
  });
  $("#CloseModal").click(function() {
      $('#myModal').modal('hide');
      $('#myAvailableForm').trigger("reset");
      $('#AddSpan').show();
      $('#EditSpan').show();
      $("input").removeAttr("disabled","disabled");
      $("textarea").removeAttr("disabled","disabled");
  });

function AtmnWizard(formId, url){

    var formData = $("#"+formId+"").serializeArray();
    // console.log(formData);
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      success: function(response) {
            console.log(response.success);
            if(response.success == 'Updated Successfully'){
              $('#myAvailableForm').trigger("reset");
              $("#unavailabeid").val('');
              $('#myModal').modal('hide');
              swal("Success!", "Your Availability Updated Successfully!", "success");
              availability_table.draw();
            }
        }
    });
}

        
$(document).ready(function() {
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

      $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
    .btn-add {
    color: #fff;
    background-color: #801214;
    border-color: #801214;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #801214;
    border-color: #801214;
}
.btn:hover {
    color: #ffffff;
}
a:hover {
    color: #801214;
    text-decoration: none;
}
.alert-success {
    color: #ffffff;
    background-color: #801214;
    border-color: #801214;
}
div .align-middle{
    color: #ffffff;
    background-color: #801214;
}
.page-link {
    color: #801214;
}
.page-link:hover{
    color: #801214;
}
 
  
</style>
@endsection