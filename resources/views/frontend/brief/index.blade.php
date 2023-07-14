@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;

$id = auth()->id();
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
            <h4 class="align-middle">Briefing History</h4>
        </div>
        <!-- <br> -->
<!-- 
        <div class="row">
          <div class="col-md-3 php-email-form" >
            <div class="row bar">
              <label>Yearly Briefing</label>
            </div>
            <ul style="list-style:none" class="briefing">
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#brief2016">
                  <span>2016</span>
                  <i class="bi bi-chevron-right icon-show"></i>
                  <i class="bi bi-chevron-down icon-close"></i>
                </div>
              </li>
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#brief2017">
                  <span>2017</span>
                  <i class="bi bi-chevron-right icon-show"></i>
                  <i class="bi bi-chevron-down icon-close"></i>
                </div>
              </li>
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#brief2018">
                  <span>2018</span>
                  <i class="bi bi-chevron-right icon-show"></i>
                  <i class="bi bi-chevron-down icon-close"></i>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-9 php-email-form">
            <div class="row bar">
              <label>Monthly briefing history list</label>
            </div>
            <div id="brief2016" class="collapse" >
              <ul style="list-style: none;">
                <li><label>2016 - Jan</label></li>
                <li><label>2016 - Feb</label></li>
                <li><label>2016 - Mar</label></li>
                <li><label>2016 - Apr</label></li>
                <li><label>2016 - May</label></li>
                <li><label>2016 - Jun</label></li>
                <li><label>2016 - Jul</label></li>
                <li><label>2016 - Aug</label></li>
                <li><label>2016 - Sep</label></li>
                <li><label>2016 - Oct</label></li>
                <li><label>2016 - Nov</label></li>
                <li><label>2016 - Dec</label></li>
              </ul>
            </div>

            <div id="brief2017" class="collapse" >
              <ul style="list-style: none;">
                <li><label>2017 - Jan</label></li>
                <li><label>2017 - Feb</label></li>
                <li><label>2017 - Mar</label></li>
                <li><label>2017 - Apr</label></li>
                <li><label>2017 - May</label></li>
                <li><label>2017 - Jun</label></li>
                <li><label>2017 - Jul</label></li>
                <li><label>2017 - Aug</label></li>
                <li><label>2017 - Sep</label></li>
                <li><label>2017 - Oct</label></li>
                <li><label>2017 - Nov</label></li>
                <li><label>2017 - Dec</label></li>
              </ul>
            </div>

            <div id="brief2018" class="collapse" >
              <ul style="list-style: none;">
                <li><label>2018 - Jan</label></li>
                <li><label>2018 - Feb</label></li>
                <li><label>2018 - Mar</label></li>
                <li><label>2018 - Apr</label></li>
                <li><label>2018 - May</label></li>
                <li><label>2018 - Jun</label></li>
                <li><label>2018 - Jul</label></li>
                <li><label>2018 - Aug</label></li>
                <li><label>2018 - Sep</label></li>
                <li><label>2018 - Oct</label></li>
                <li><label>2018 - Nov</label></li>
                <li><label>2018 - Dec</label></li>
              </ul>
            </div>
          </div>
        </div> -->


        @if (session('success'))
           <br>
           <div class="alert alert-success" id="success">
              {{ session('success') }}
           </div>
        @endif         
        @if($isUSER=='ds'||$isUSER=='admin')
        <br>
        @endif
        @if($isUSER=='')
        <br>
        @if($addBrief == '')
        <div align="right">
        <a href="{{ url('recruitment/brief/create') }}"><button class="btn btn-add m-t-15 waves-effect mb-3"  type="button" style="" >{!! trans('main.add') !!}</button></a>
        </div>
        @endif
        @endif
      </div>
    </nav>
    <table id="datatable" class="table table-hover responsive" style="width:100%">
        <thead>
            <tr>
              <th>Pastor Name</th>
              <th>District</th>
              <th>Briefing Month</th>
              <th>Approved date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if($data)
        @foreach($data as $value)
        <tr>
          <td>{!! ATMNHelper::getName(@$value->user_id) !!}</td>
          <td>{!! ATMNHelper::getdistrictname(@$value->d_id) !!}</td>
          <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('m-d-Y H:i A') }}</td>
          @if($value->ds_approved_date != "")
          <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->ds_approved_date)->format('m-d-Y H:i A') }}</td>
          @else
          <td></td>
          @endif
          <td class="brief-status-{{ $value->brief_status }}">
            {{ $value->brief_status }}
          </td>
          <td>
          <a href="{{url('recruitment/brief/show',array(ATMNHelper::encryptUrl(@$value->id)))}}" class="get_view" data-id="{{$value->id}}"><i class="fa fa-eye"></i></a>
          @if($value->brief_status == "Pending")
          <a href="{{url('recruitment/brief/edit',array(ATMNHelper::encryptUrl(@$value->id)))}}"><i class="fa fa-edit" ></i></a>
          @endif
          <!-- <a href="{{url('recruitment/brief/destroy',array(ATMNHelper::encryptUrl(@$value->id)))}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
        @else
        @endif
        </tbody>
    </table>
</div>

<div class="modal fade" id="cms_model" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View {!! trans('main.cms.title') !!}</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.titles') !!}</strong></div>
              <div class="col-md-8"><span class="title"></span></div>
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.seo_title') !!}</strong></div>
              <div class="col-md-8"><span class="seo_title"></span></div>
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.short_description') !!}</strong></div>
              <div class="col-md-8"><span class="short_description"></span></div>
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.long_description') !!}</strong></div>
              <div class="col-md-8"><span class="long_description"></span></div>
          </div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.status') !!}</strong></div>
              <div class="col-md-8"><span class="status"></span></div>
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.cms.submitted_on') !!}</strong></div>
              <div class="col-md-8"><span class="created_at"></span></div>
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('main.updated_at') !!}</strong></div>
              <div class="col-md-8"><span class="updated_at"></span></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
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
    $("#datatable").DataTable({
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

div .align-middle{
    color: #ffffff;
    background-color: #801214;
}
 

</style>
@endsection