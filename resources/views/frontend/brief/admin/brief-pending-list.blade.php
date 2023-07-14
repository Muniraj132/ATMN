@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;

$isUSER = ATMNHelper::isUSER();

@endphp

<div class="col-md-9" id="bri_ind_container">
<div class="php-email-form">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="ttps://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css"> -->

    
    <!-- Navbar -->
    <nav id="navbar" class="flexbox profile-nav">
      <!-- Navbar Inner -->
      <div class="navbar-inner view-width flexbox-space-bet">
        <div class="row align-middle">
            <h4 class="align-middle">
            Briefing History - Pending list
        </h4>
        </div>         
        <br>
      </div>
    </nav>

    @if (session('success'))
   <div class="alert alert-success" id="success">
      {{ session('success') }}
   </div>
   @endif
      
    <table id="example" class="table table-hover responsive" style="width:100%;font-size: 14px;">
        <thead>
          <tr>
            <th>Pastor Name</th>
            <th>District</th>
            <th>Briefing Month</th>
            <th>Submitted date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($pending_brief_history as $value)
            <tr>
            <td>{!! ATMNHelper::getName(@$value->user_id) !!}</td>
            <td>{!! ATMNHelper::getdistrictname(@$value->d_id) !!}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('F') }}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('m-d-Y') }}</td>
            <td class="brief-status-{{ $value->brief_status }}">
               {{ $value->brief_status }}
            </td>
            <td>
              <a href="{{url('recruitment/brief/adminshow',array(ATMNHelper::encryptUrl(@$value->id)))}}" class="get_view" data-id="{{$value->id}}"><i class="fa fa-eye"></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script>

    function disabledsuccessmsg() {
      setTimeout(function() {
        document.getElementById("success").style.display = "none";
      }, 100);
    }
    document.getElementById("bri_ind_container").addEventListener("click", disabledsuccessmsg);

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