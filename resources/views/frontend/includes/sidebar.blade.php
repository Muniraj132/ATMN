@php 
$mainkey=rand(0, 99999);
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;
$id = auth()->id();
$isUSER = ATMNHelper::isUSER();

@endphp

@if($isUSER=='')
<div class="col-md-3">
  <div class="php-email-form">
    <!-- <h6>Candidate Application</h6> -->
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
       <a class="nav-link {{ request()->is('*/dashboard') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{ url('/recruitment/dashboard') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
      <!-- <a class="nav-link {{ request()->is('*/profile') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{ url('recruitment/profile') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">ATMN Profile</a> -->
      <a class="nav-link {{ request()->is('*/app/create') ? 'active' : '' }}" id="v-pills-profile-tab" data-toggle="pill" href="{{ url('/recruitment/app/create') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      @if( $status == "Approve" ||  request()->is('*/brief*') )
      <a class="nav-link {{ request()->is('*/brief*') ? 'active' : '' }}" id="v-pills-profile-tab" data-toggle="pill" href="{{ url('recruitment/brief') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Briefing History 
        @if(ATMNHelper::getrecentbrief() == "show")
        <i class="mdi mdi-information-outline" data-toggle="tooltip" title="Briefing History Overdue" style="color: red;"></i>
        @endif
      </a>
      @endif
      @if(ATMNHelper::availabilitycount(@$id) != 0)
      <a class="nav-link {{ request()->is('*/pastor-availability') ? 'active' : '' }}" id="v-pills-messages-tab" data-toggle="pill" href="{{ route('Pastorviewavailability')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Availability</a>
      @endif
      <a class="nav-link {{ request()->is('*/status-history') ? 'active' : '' }}" id="v-pills-settings-tab" data-toggle="pill" href="{{ Route('status_history') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Status</a>
    </div>
  </div>
</div>
@endif

@if($isUSER=='admin' || $isUSER=='ds')
<div class="col-md-3">
  <div class="php-email-form">
    <h6>Search</h6>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="font-size:15px">
        <a class="nav-link {{ request()->is('*/candidate-search') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('searchindex')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Candidate Search</a>
      </div>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="font-size:15px">
        <a class="nav-link {{ request()->is('*/pastor-search') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('pastorsearch')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Pastor Search</a>
      </div>
  </div>
  <br>

  <div class="php-email-form">
        @if($isUSER=='ds')
        <h6>Overview</h6>
        @endif
        @if($isUSER=='admin')
        <h6>Report / Dashboard</h6>
        @endif
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="font-size:15px">
        <!-- <a class="nav-link {{ request()->is('') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">Candidates Certified</a>
        <a class="nav-link {{ request()->is('') ? 'active' : '' }}" id="v-pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-profile" aria-selected="false">Candidates In Process</a>
        <a class="nav-link {{ request()->is('') ? 'active' : '' }}" id="v-pills-messages-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-messages" aria-selected="false">Candidates Placed</a> -->
        @if($isUSER=='ds')
        <a class="nav-link {{ request()->is('*/dashboard') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{ url('/recruitment/dashboard') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
        @endif
        <a class="nav-link {{ request()->is('*/opportunitiesindex') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{ route('opportunitiesindex') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Current Opportunities</a>
        @if($isUSER=='admin')
        <a class="nav-link {{ request()->is('*/resourceindex') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('resourceindex')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Resource Uploads</a>
        <a class="nav-link {{ request()->is('*/users-list') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('userslist')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Users List</a>
        <a class="nav-link {{ request()->is('*/restore-user') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('trash')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Restore User</a>
        <a class="nav-link {{ request()->is('*/contact-us-report') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="{{Route('contactusreport')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Contact Report</a>
        @endif

    </div>
  </div>
</div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>