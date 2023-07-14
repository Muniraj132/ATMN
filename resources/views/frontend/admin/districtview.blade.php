@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
$isUSER = ATMNHelper::isUSER();
$path = Route::currentRouteName();
$user_type = Auth::user()->district_id;
@endphp

<div class="col-md-9" id="bri_ind_container">
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
            <h4 class="align-middle">
            {{$district_value}} (Pastor Application) @if($path == 'app.districtpendinglist')
            - Pending 
            @endif
            @if($path == 'app.districtapprovedlist')
            - Approved
            @endif</h4>
        </div>         
        <br>
      </div>
    </nav>
      
    <table id="example" class="table table-hover responsive" style="width:100%">
        <thead>
          <tr>
            <th>Pastor</th>
            @if($path == 'app.districtpendinglist')
            <th>Date</th>
            @endif
            @if($path == 'app.districtapprovedlist')
            <th>Approve date</th>
            @endif
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
            @if($path == 'app.districtpendinglist')        
                @foreach($district_app_pendinglist as $value)
                <tr>
                    <td>
                        @if($user_type == "National Office")
                        <a href="{{route('ds.app.show',array(ATMNHelper::encryptUrl(@$value['id'])))}}">
                        @else
                        <a href="{{route('admin.app.edit',array(ATMNHelper::encryptUrl(@$value['id'])))}}">
                        @endif
                        @if($value["title"] != null)
                            {{$value["title"]}}.&nbsp;
                        @endif
                        {{ $value["first_name"]}}&nbsp;{{ $value["last_name"]}}</a>
                    </td>
                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($value["created_at"]))->format('m-d-Y')}}</td>
                    @if(isset($value["pending"]))
                    <td>Pending</td>
                    @endif
                </tr>
                @endforeach
            @endif
            @if($path == 'app.districtapprovedlist')
                @foreach($district_app_approvelist as $value)
                <tr>
                    <td>
                        @if($user_type == "National Office")
                        <a href="{{route('ds.app.show',array(ATMNHelper::encryptUrl(@$value['id'])))}}">
                        @else
                        <a href="{{route('admin.app.show',array(ATMNHelper::encryptUrl(@$value['id'])))}}">
                        @endif
                        
                        @if($value["title"] != null)
                            {{$value["title"]}}.&nbsp;
                        @endif
                        {{ $value["first_name"]}}&nbsp;{{ $value["last_name"]}}</a>
                    </td>
                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($value["approved_date"]))->format('m-d-Y')}}</td>
                    @if(isset($value["approve"]))
                    <td>Approved</td>
                    @endif
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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