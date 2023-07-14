@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
@endphp
<div class="col-9" id="bri_ind_container">
<div class="php-email-form">
   @if (session('success'))
   <div class="alert alert-success" id="success">
      {{ session('success') }}
   </div>
   @endif

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="ttps://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"> -->

    
   <!-- Navbar -->
   <nav id="navbar" class="flexbox profile-nav">
      <!-- Navbar Inner -->
      <div class="navbar-inner view-width flexbox-space-bet">
         <div class="row align-middle">
            <h4 class="align-middle"> - Approved Applications</h4>
        </div>
         <br>
      </div>
   </nav>

      
<table id="example" class="table table-hover responsive" style="width:100%">
    <thead>
        <tr>
            <th>Submitted Date</th>
            <th>Approved Date</th>
            <!-- <th>{!! trans('main.status') !!}</th> -->
            <th>{!! trans('main.action') !!}</th>
        </tr>
    </thead>
    <tbody>
        @if($data)
        @foreach($data as $value)
        <tr>

        <td>{!! ATMNHelper::adminViewDate(@$value->created_at) !!}</td>
        <td>{{$value->approved_date}}</td>
        <!-- <td>{!! $value->status !!}</td> -->
        <td>
        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><i class="fa fa-eye"></i></a>
        <a href="{{route('brief.edit',array(ATMNHelper::encryptUrl(@$value->id)))}}"><i class="fa fa-edit" ></i></a>

        <!-- <a href="{{route('brief.destroy',array(ATMNHelper::encryptUrl(@$value->id)))}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a> -->
        </td>
        </tr>
        @endforeach
        @else
        @endif
    </tbody>
</table>


</div>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script>
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

   
       // //View
       // function viewPopup(id){
       //     var id    = id;
       //     $("#cms_model").modal('show');
       //     var token = '<?php echo csrf_token(); ?>';
       //     var setUrl = "{{ URL::to('brief') }}/"+id;
       //     $.ajax({
       //         url: setUrl,
       //         type: 'GET',
       //         async: true,
       //         cache:false,
       //         success: function(data){
       //             if(data){
       //                 var getData = JSON.parse(data);
       //                 var setData = getData['cms'];
       //                 var setDatePosted  = moment(setData.created_at).format('D-MMMM-Y h:mm:ss A');
       //                 var setDateUpdated = moment(setData.updated_at).format('D-MMMM-Y h:mm:ss A');
       //                 $(".title").text(setData.title);
       //                 $(".seo_title").text(setData.seo_title);
       //                 $(".short_description").text(setData.short_description);
       //                 $(".long_description").html(setData.long_description);
       //                 $(".status").text(setData.status);
       //                 $(".created_at").text(setDatePosted);
       //                 $(".updated_at").text(setDateUpdated);
       //             } else {
       //                 $(".title").text("");
       //                 $(".seo_title").text("");
       //                 $(".short_description").text("");
       //                 $(".long_description").text("");
       //                 $(".status").text("");
       //                 $(".created_at").text("");
       //                 $(".updated_at").text("");
       //             }
       //         }
       //     });
       //  };

        // Disable Success Message
        function disabledsuccessmsg() {
          setTimeout(function() {
            document.getElementById("success").style.display = "none";
          }, 100);
        }
        document.getElementById("bri_ind_container").addEventListener("click", disabledsuccessmsg);

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
</style>
@endsection