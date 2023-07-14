@extends('frontend.layouts.main')
@section('content')

@php 
$mainkey=rand(0, 99999);
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;

$id = auth()->id();
$isUSER = ATMNHelper::isUSER();

if(isset($data->brief_status)){
  $brief_status = $data->brief_status;
}else{
  $brief_status = "";
}

if(request()->is('*/dsshow/*')){
  $url = 'true';
}else{
  $url = '';
}

if(isset($data)){
  if($brief_status == 'Approved'){
    $status_date = $data->ds_approved_date;
  }else{
    $status_date = $data->created_at;
  }
}

@endphp

<div class="col-md-9">
      <div class="tab-content" id="v-pills-tabContent">
    @if(isset($data))
        <form  action="{{ route('brief.update', ATMNHelper::encryptUrl(@$data->id)) }}"  role="form" method="put" class="php-email-form">
            @method('put')
    @else
        <form method="post" action="{{ route('brief.store') }}" role="form" class="php-email-form"> 
    @endif
       
      
         @csrf
         <input type="hidden" name="pastor_id" value="@php echo $id; @endphp">
         <input type="hidden" name="approver_id" value="@php echo $id; @endphp">
      <div align="center"><h6>Ministry Engagement Briefing</h6></div>
      <div align="center"><label style="font-size: 12px;">Alliance Transitional Ministries Network</label></div>
      <div align="center"><label>“To be completed by the ATMN  Pastor each month.”</label></div>
      @if(isset($data))
        <div align="right">
          <h6 class="brief-status-{{ $data->brief_status ?? '' }}" style="padding-right: 30px">
            ({{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$status_date)->format('m-d-Y H:i A') }} - {{$data->brief_status ?? '' }})
          </h6>
        </div>
      @endif
     <div class="row">
       <br>
     </div>
      <div class="row" style="height: 30px;">
        <div class="col-md-12">
          <div class="row">
            <div class="form-group col-md-6">
              <label class="label-name">Pastor:</label>&nbsp;
              <label class="label-name">
                <strong>  
                {!! ATMNHelper::getName(@$data->user_id) !!}
                </strong>
              </label>
            </div>
            <div class="form-group col-md-6" align="end">
              <label class="label-name" >Date: </label>
              <label class="label-name"><strong><input type="text" name="pastor" class="underline bri-date" id="pastor" value="{{Carbon\Carbon::now()->format('m-d-Y')}}" disabled="disabled"></strong></label>
            </div>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="form-group col-md-6">
              <label class="label-name">District:</label>
              <select class="select-district" disabled="disabled">
                <option>Select District</option>
                  @foreach($district as $value)
                  <option value="{!! $value->d_id !!}" {{ $value->d_id == $data->d_id ? 'selected' : '' }}>{!! $value->district !!}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-6" align="end">
              <label class="label-name">Church:</label>
              <input type="text" name="pastor" class="underline church-name" id="pastor" value="{{$data->church_name ?? '' }}" disabled="disabled">
            </div>
          </div>
        </div>
      </div>  

      <div class="row">
        <div class="col-md-12">
          <div class="row">
             <h6 class="brief-label-name">1. Your personal wellbeing:</h6><br>
            <div class="form-group col-md-12 ">
              <label class="label-name">What are you excited about?  What are your greatest challenges at this stage of the transition? Were you able to accomplish the task(s) you prioritized last month?</label>
              <textarea class="form-control" name="personal_wellbeing_are_you_exited" disabled="disabled">{{$data->personal_wellbeing_are_you_exited ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">2. Overview of church health:</h6><br>
            <div class="form-group col-md-12 ">
              <label class="label-name">What is going well? What do you see as needing prayer and attention?</label>
              <textarea class="form-control" name="overview_church_health_prayer_attention" disabled="disabled">{{$data->overview_church_health_prayer_attention ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">3. Specific concerns:</h6><br>
            <div class="form-group col-md-12 spec-concern">

              <label class="label-name"><strong>Restoring hope and re-kindling vision:</strong>  
              What issues in congregational life are you addressing in your preaching? How is the congregation responding? Is the worship team responding to your leadership? </label>
              <textarea class="form-control" name="specific_concern_restoring_hope" disabled="disabled">{{$data->specific_concern_developing_culture_of_prayer ?? ''}}</textarea>

              <div class="sub-">
                <label class="label-name">What progress is being made in developing a culture of prayer and dependence upon the Holy Spirit?</label>
                <textarea class="form-control" name="specific_concern_developing_culture_of_prayer" disabled="disabled">{{$data->specific_concern_developing_culture_of_prayer ?? ''}}</textarea>
              </div>
                  
              <label class="label-name"><strong>Rebuilding mission:</strong>  
              What steps do you need to take to increase and/or restore trust in pastoral leadership? Is the church developing a clear sense of biblical mission, vision, and values? </label>
              <textarea class="form-control" name="specific_concern_rebuilding_mission"  disabled="disabled">{{$data->specific_concern_rebuilding_mission ?? ''}}</textarea>

              <label class="label-name"><strong>Recruiting lay leaders:</strong> 
              How are you preparing lay leadership to assume their leadership role in the church?  </label>
              <textarea class="form-control" name="specific_concern_recruit_lay_leaders" disabled="disabled">{{$data->specific_concern_recruit_lay_leaders ?? ''}}</textarea>

              <label class="label-name"><strong>Resetting governance:</strong> (see MOA).  
              What areas of the church’s governance, including the congregation’s bylaws need to be improved? What steps are you taking to address these needs?</label>
              <textarea class="form-control" name="specific_concern_reset_governance"  disabled="disabled">{{$data->specific_concern_reset_governance ?? ''}}</textarea>

              <label class="label-name"><strong>Resolving conflict:</strong> 
              Have you identified areas of conflict in the congregation? What steps are you taking to resolve these issues? </label>
              <textarea class="form-control" name="specific_concern_resolve_conflict" disabled="disabled">{{$data->specific_concern_resolve_conflict ?? ''}}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">4. Other objectives:</h6><br>
            <div class="form-group col-md-12 ">
              <label class="label-name">What other objectives outlined in your MOU have required your attention?  How are you addressing them? </label>
             <textarea class="form-control" name="other_objectives_outline"  disabled="disabled">{{$data->other_objectives_outline ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">5.  What is your greatest priority for this next month?</h6><br>
            <div class="form-group col-md-12 ">
              <textarea class="form-control" name="greatest_priority_for_next_month"  disabled="disabled">{{$data->greatest_priority_for_next_month ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">6.  What do you need from the district superintendent and/or the district to reach the objectives stated in the MOU with the church?</h6><br>
            <div class="form-group col-md-12 ">
              <textarea class="form-control" name="mou_with_church" disabled="disabled">{{$data->mou_with_church ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>

      @if($isUSER=='ds' && $data->ds_comments != '')

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h6 class="brief-label-name">DS Comments</h6><br>
            <div class="col form-group col-md-12">
              <textarea class="form-control" name="ds_comments" placeholder="DS Comments" rows="4" disabled="disabled">{{$data->ds_comments ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>
      @endif

      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div>
      <div class="text-center">
      @if($isUSER=='')
      <button type="submit">{{ trans('main.save') }}</button>
      @endif

    	@if($isUSER=='ds')
        @if(@$data->brief_status == "Approved" && $url == 'true')
          <a href="{{Route('briefdsapprovedlist')}}" style="color: #fff; background: #801214; padding: 11px 22px 11px 21px; border-radius: 5px;"onmouseover="">Close</a>
        @else
          <a href="{{Route('briefdspendinglist')}}" style="color: #fff; background: #801214; padding: 11px 22px 11px 21px; border-radius: 5px;"onmouseover="">Close</a>
        @endif
    	@endif
      </div>
      </form>
      </div>
      </div>
@endsection