@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;

$isUSER = ATMNHelper::isUSER();

$user_type = Auth::user()->district_id;

@endphp

<style type="text/css">
    .callout {
      padding: 20px;
      border: 1px solid #801214;
      border-left-width: 5px;
      border-radius: 3px;
      }
    h4 {
        margin-top: 0;
        margin-bottom: 5px;

    }
    p:last-child {
        margin-bottom: 0;
    }
    code {
      border-radius: 3px;
      }
    & + .bs-callout {
       margin-top: -5px;
    }
    a:hover{
        color: #801214;
    }
    .usertype-bg{
        background-color: #801214;
        color: #fff;
    }
    .m-5 {
    margin: 0rem 0rem 1rem 4rem!important;
    }

</style>

<div class="col-md-9" id="bri_ind_container">
    <div class="php-email-form">
        @if(@$isUSER=='')
        <div class="row cards usertype-bg">
            <h4 class="align-middle">Dashboard</h4>
        </div>
        <br>
        @if (session('success'))
               <div class="alert alert-success" id="success">
                  {{ session('success') }}
               </div>
               <br>
        @endif
        <div class="row cards">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <h6>Application</h6>
                        @php
                        $status = $user_data['status'] ?? '';
                        $user_id = $user_data['user_id'] ?? '';
                        @endphp
                        @if($status == "Pending") 
                            <a href="{{route('app.step.one')}}">Pending</a>
                        @elseif($status == "Approve")
                            <a href="{{route('app.step.one')}}">Approved</a>
                        @else
                            <a href="{{route('app.step.one',array(ATMNHelper::encryptUrl(@$value->id)))}}">Apply</a>
                        @endif

                </div>
            </div>
            <div class="col-md-5">
                @if($status == "Approve")
                <div class="callout callout-info">
                    <h6>Briefing History</h6>
                    <a href="{{ url('recruitment/brief') }}">Apply</a>
                </div>
                @endif
            </div>
        </div>
        <br>
        @endif

        @if(@$isUSER=='ds')
        <div class="row cards usertype-bg">
            <h4 class="align-middle">{!! @$district_value !!}</h4>
        </div>
        <br>
        @if (session('success'))
               <div class="alert alert-success" id="success">
                  {{ session('success') }}
               </div>
               <br>
        @endif
        <div class="row cards">
            <h5 class="m-5">Application</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Pending</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('app.adminapplicationlist') }}"><h4 align="center">{{str_pad($total_app_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('app.dspendinglist')}}"><h4 align="center">{{@str_pad($total_app_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Approved</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('app.adminapplicationlist') }}"><h4 align="center">{{str_pad($total_app_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('app.dsapprovedlist') }}"><h4 align="center">{{str_pad($total_app_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row cards" >
            <h5 class="m-5">Briefing History</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Pending</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('briefadminpendinglist') }}"><h4 align="center">{{str_pad($total_brief_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('briefdspendinglist') }}"><h4 align="center">{{str_pad($total_brief_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Approved</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('briefadminapprovedlist') }}"><h4 align="center">{{str_pad($total_brief_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('briefdsapprovedlist') }}"><h4 align="center">{{str_pad($total_brief_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row cards" >
            <h5 class="m-5">Availability</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Placed</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('app.adminavailabilitylist') }}"><h4 align="center">{{str_pad($total_placed_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('app.dsplacedlist')}}"><h4 align="center">{{str_pad($total_placed_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Available</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @if($user_type == "National Office")
                            <a href="{{ route('app.adminavailabilitylist') }}"><h4 align="center">{{str_pad($total_available_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @else
                            <a href="{{ route('app.dsavailablelist')}}"><h4 align="center">{{str_pad($total_available_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($isUSER=='admin')
        <div class="row cards usertype-bg">
            <h4 class="align-middle">Admin Dashboard</h4>
        </div>
        <br>
        <div class="row cards">
            <h5 class="m-5">Application</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Pending</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('app.adminapplicationlist') }}"><h4 align="center">{{str_pad($total_app_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Approved</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('app.adminapplicationlist') }}"><h4 align="center">{{str_pad($total_app_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row cards" >
            <h5 class="m-5">Monthly Briefing History</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Pending</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('briefadminpendinglist') }}"><h4 align="center">{{str_pad($total_brief_pending_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Approved</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('briefadminapprovedlist') }}"><h4 align="center">{{str_pad($total_brief_approve_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row cards" >
            <h5 class="m-5">Availability</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Placed</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('app.adminavailabilitylist') }}"><h4 align="center">{{str_pad($total_placed_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Available</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('app.adminavailabilitylist') }}"><h4 align="center">{{str_pad($total_available_count, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row cards" >
            <h5 class="m-5">Districts</h5>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Staff</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{Route('districtstafflist')}}"><h4 align="center">{{str_pad($dsstaffcount, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>No Staff</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{Route('districtstafflist')}}"><h4 align="center">{{str_pad($districtcount-$dsstaffcount, 2, "0", STR_PAD_LEFT);}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>  
<script type="text/javascript"> 

    function disabledsuccessmsg() {
      setTimeout(function() {
        document.getElementById("success").style.display = "none";
      }, 100);
    }
    document.getElementById("bri_ind_container").addEventListener("click", disabledsuccessmsg);

</script>
 
@endsection