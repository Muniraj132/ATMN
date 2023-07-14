@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;
$isUSER = ATMNHelper::isUSER();
$mainkey=rand(0, 99999);
$user_id = Auth::user()->id;
@endphp
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="col-md-9">
  <div id="wizard" role="application" class="wizard clearfix">
    <div class="steps clearfix">
      <ul role="tablist">
        <li role="tab" class="disabled" aria-disabled="false" id="one" aria-selected="true">
          <a href="#step1" id="personal_info" data-toggle="tab" >
            <div class="media" id="tab1">
              <div class="bd-wizard-step-icon" ><i class="mdi mdi-account-outline"></i></div>
              <div class="media-body">
                <div class="bd-wizard-step-title">Contact Details</div>
              </div>
            </div>
          </a>
        </li>
        <li role="tab" class="disabled" id="two" aria-disabled="true">
          <a href="#step2" id="contact_details" data-toggle="tab">
            <div class="media" id="tab2">
              <div class="bd-wizard-step-icon" ><i class="mdi mdi-bank"></i></div>
              <div class="media-body">
                <div class="bd-wizard-step-title">Availability &#38; Preferences</div>
              </div>
            </div>
          </a>
        </li>
        <li role="tab" class="disabled" id="three" aria-disabled="true">
          <a href="#step3" id="my_availability" data-toggle="tab">
            <div class="media" id="tab3">
              <div class="bd-wizard-step-icon" ><i class="mdi mdi-calendar-clock"></i></div>
              <div class="media-body">
                <div class="bd-wizard-step-title">Training &#38; Terms</div>
              </div>
            </div>
          </a>
        </li>
        <li role="tab" class="disabled" id="four" aria-disabled="true" >
          <a href="#step4" id="submit" data-toggle="tab">
            <div class="media" id="tab4">
              <div class="bd-wizard-step-icon" ><i class="mdi mdi-account-check-outline"></i></div>
              <div class="media-body">
                <div class="bd-wizard-step-title">Status History</div>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
  <div class="content clearfix appenddata" style="background-color:#fff;">

  <!-- -------------- Step 1 wizard Section Start -------------- -->

@if($isUSER == '')
  @if($data == "")
    <input type="hidden" value="1" id="stepthreedisable" name="stepthreedisable">
  @elseif($data != "" && $data->ministry_area == '' ?? Null)
    <input type="hidden" value="2" id="steptwoshow" name="steptwoshow">
  @elseif($data != "" && $data->training == '' ?? Null)
    <input type="hidden" value="3" id="stepthreeshow" name="stepthreeshow">
  @elseif($data != "" && $data->app_sent == '' ?? Null)
    <input type="hidden" value="4" id="stepallshow" name="stepallshow">
  @elseif($data != "" && $data->status == "Pending")
    <input type="hidden" value="5" id="stepallshowsubmit" name="stepallshowsubmit">
  @elseif($data != "" && $data->status == "Approve")
    <input type="hidden" value="6" id="stepallshowapprove" name="stepallshowapprove">
  @endif
@endif
@if(@$isUSER == 'ds') 
    <input type="hidden" value="6" id="stepallshowapprove" name="stepallshowapprove">
@endif
    <div id="step1"> 
@php
if(empty($file_data->self_assessment))
  $self_assessment = '';
else
  $self_assessment = $file_data->self_assessment;
@endphp
@php
if(empty($file_data->application_part_I))
  $application_part_I = '';
else
  $application_part_I = $file_data->application_part_I;
@endphp
@php
if(empty($file_data->application_part_II))
  $application_part_II = '';
else
  $application_part_II = $file_data->application_part_II;
@endphp
@php
if(empty($file_data->background_check))
  $background_check = '';
else
  $background_check = $file_data->background_check;
@endphp
@php
if(empty($file_data->resume))
  $resume = '';
else
  $resume = $file_data->resume;
@endphp     
@php
$home_address = $data->home_address ?? '';
$value=explode(",",$home_address);
    $street1  = $value[0] ?? '';
    $street2  = $value[1] ?? '';
    $city     = $value[2] ?? '';
    $stateval = $value[3] ?? '';
    $country  = $value[4] ?? 'US';
    $zip      = $value[5] ?? '';
@endphp
@php
if(empty($data->license))
  $license = '';
else
  $license = $data->license;
@endphp
@php
if(empty($data->willing_commute))
  $willing_commute = '';
else
  $willing_commute = $data->willing_commute;
@endphp
@php 
if(empty($data->onsite_arrangement))
  $onsite_arrangement = '';
else
  $onsite_arrangement = $data->onsite_arrangement;
@endphp
@php
if($data == '')
  $titleVal = '';
else
  $titleVal = $data->title;
@endphp  
@php 
if(empty($data->district_id))
  $district_id = '';
else
  $district_id = $data->district_id;
@endphp
@php 
if(empty($data->prefer_serve_district))
  $prefer_serve_district = '';
else
  $prefer_serve_district = $data->prefer_serve_district;
@endphp
@php 
if(empty($data->district_issuing))
  $district_issuing = '';
else
  $district_issuing = $data->district_issuing;
@endphp
@php 
if(empty($data->country))
  $countryVal = '';
else
  $countryVal = $data->country;
@endphp
@php
if(empty($data->ministry_area))
  $ministry_area_val = '';
else
  $ministry_area_val = $data->ministry_area;
@endphp
@php
if(empty($data->comfortable_serving_church))
  $comfortable_serving_church_val = '';
else
  $comfortable_serving_church_val = $data->comfortable_serving_church;
@endphp
@php
if(empty($data->prefer_serve_church))
  $prefer_serve_church_val = '';
else
  $prefer_serve_church_val = $data->prefer_serve_church;
@endphp
@php
if($data == '')
  $status = '';
else
  $status = $data->status;
@endphp
@php
if(empty($data->submit_status))
  $submit_status = '';
else
  $submit_status = $data->submit_status;
@endphp
@php
if($data == '')
  $peacemaking_data = '';
else
  $peacemaking_data = $data->peacemaking;
@endphp
@php
if($data == '')
  $language = '';
else
  $language = $data->language;
@endphp
@php
if($data == '')
$ipm = '';
else
$ipm = $data->interim_pastor_ministries;
@endphp
@php
if($data == '')
$vcm = '';
else
$vcm = $data->vital_church_ministries;
@endphp

      <form  role="form" id="storestep1" >
        @csrf
        <section style="padding:40px"  role="tabpanel" aria-labelledby="wizard-h-0" class="body" aria-hidden="true" >
          <div class="row bar">
            <label>Profile Details</label>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4" align="center">
                <img src="{{asset('assets\img\alliance-logo.png')}}" width="150px" >
            </div>
            <div class="col-md-8">
              <br>
                <div class="row">
                    <div class="col-md-3"><label>Username</label></div>
                    <div class="col-md-8"><label>{!! ATMNHelper::getname(@$data->user_id) != null ? ATMNHelper::getname(@$data->user_id) : Auth::user()->username !!}</label></div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-3"><label>Email</label></div>
                    <div class="col-md-8"><label>{!! ATMNHelper::getemail(@$data->user_id) !!}</label></div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-md-3"><label>Address</label></div>
                    <div class="col-md-8">
                        @if($street1 != "")
                        <label>{{$street1}},{{$street2}}@if($street2),@endif</label><br>
                        <label>{{$city}},{{$stateval}},<br></label><br>
                        <label>{{$country}},{{$zip}}.<br></label>
                        @endif
                    </div>
                </div> -->
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <!-- <label>
                            <a href="#" id="profile_edit" data-id="{{ Auth::user()->id }}">Profile Edit</a>
                        </label> -->
                    </div>
                    <div class="col-md-8">
                        <label>
                            <a href="{{ route('user.change-password',array(ATMNHelper::encryptUrl(Auth::user()->id))) }}">Change Password</a>
                        </label>
                    </div>
                </div>
                <br> 
            </div>
          </div>
          <br>
          <h4 class="section-heading">Contact Details @if($status  == 'Pending')<span style="color:#801214;float: right;">(Pending)</span>@endif @if($status  == 'Approve')<span style="color:green;float: right;">(Approved)</span>@endif</h4>
          <div class="content-wrapper">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.first.name') !!} <span class="astrict">*</span></label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{!! trans('main.user.first.name') !!}" value="{{ $data->first_name ?? '' }}" >
                        @if ($errors->has('first_name'))
                           <span class="help-block">
                              {{ $errors->first('first_name') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6 col-sm-6">
                        <label class="label-name">{!! trans('main.user.last.name') !!} <span class="astrict">*</span></label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="{!! trans('main.user.last.name') !!}" value="{{ $data->last_name ?? '' }}" >
                        <input type="hidden" name="mainkey" class="form-control" id="mainkey" placeholder="" value="{{ $data->mainkey ?? @$mainkey }}">
                        @if ($errors->has('last_name'))
                           <span class="help-block">
                              {{ $errors->first('last_name') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.app.title') !!}</label>
                        <select class="form-select" name="title" id="title">
                          <option value="">Select Title</option>
                          <option value="Mr" {{ $titleVal == 'Mr' ? 'selected' : '' }} >Mr</option>
                          <option value="Mrs" {{ $titleVal == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                          <option value="Ms" {{ $titleVal == 'Ms' ? 'selected' : '' }}>Ms</option>
                          <option value="Dr" {{ $titleVal == 'Dr' ? 'selected' : '' }}>Dr</option>
                          <option value="Rev" {{ $titleVal == 'Rev' ? 'selected' : '' }}>Rev</option>
                          <option value="Miss" {{ $titleVal == 'Miss' ? 'selected' : '' }}>Miss</option>
                        </select>
                        <!-- <input type="text" name="title" class="form-control" id="title" placeholder="{!! trans('main.user.app.title') !!}" value="{{ $data->title ?? '' }}" > -->
                        @if ($errors->has('title'))
                           <span class="help-block">
                              {{ $errors->first('title') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.email') !!} <span class="astrict">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="{!! trans('main.user.email') !!}" value="{{ $data->email ?? '' }}">
                        @if ($errors->has('email'))
                           <span class="help-block">
                              {{ $errors->first('email') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.mobile.phone') !!}</label>
                        <input type="text" class="form-control" name="cell_phone" id="cell_phone" placeholder="{!! trans('main.user.mobile.phone') !!}" value="{{ $data->cell_phone ?? '' }}">
                        @if ($errors->has('cell_phone'))
                           <span class="help-block">
                              {{ $errors->first('cell_phone') }}
                           </span>
                        @endif
                      </div>
                       <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.work.phone') !!}</label>
                        <input type="text" class="form-control" name="office_phone" id="office_phone" placeholder="{!! trans('main.user.work.phone') !!}" value="{{ $data->office_phone ?? '' }}">
                        @if ($errors->has('office_phone'))
                           <span class="help-block">
                              {{ $errors->first('office_phone') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.home.phone') !!}</label>
                        <input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="{!! trans('main.user.home.phone') !!}" value="{{ $data->home_phone ?? '' }}">
                        @if ($errors->has('home_phone'))
                           <span class="help-block">
                              {{ $errors->first('home_phone') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.district') !!} <span class="astrict">*</span></label>
                        <select class="form-select" name="district_id" id="district_id" value="{{ $data->district_id ?? ''}}">
                          <option value="">Select District</option>
                          @foreach($district as $value)
                          <option value="{!! $value->d_id !!}" {{ $district_id == $value->d_id ? 'selected' : ''}}>{!! $value->district !!}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('district_id'))
                           <span class="help-block">
                              {{ $errors->first('district_id') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row bar">
                  <label>Home Address</label>
                </div>
                <div class="row">
                  <div class="col form-group col-md-4">
                        <label class="label-name">{!! trans('main.user.street1') !!} <span class="astrict">*</span></label>
                        <input type="text" class="form-control" name="street1" id="street1" placeholder="{!! trans('main.user.street1') !!}" value="{{ $street1 ?? '' }}" required>
                        @if ($errors->has('street1'))
                           <span class="help-block">
                              {{ $errors->first('street1') }}
                           </span>
                        @endif
                      </div>
                  <div class="col form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.street2') !!}</label>
                    <input type="text" class="form-control" name="street2" id="street2" placeholder="{!! trans('main.user.street2') !!}" value="{{ $street2 ?? '' }}">
                    @if ($errors->has('street2'))
                       <span class="help-block">
                          {{ $errors->first('street2') }}
                       </span>
                    @endif
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.country') !!} <span class="astrict">*</span></label>
                    <select class="form-select" name="country" id="country" placeholder="{!! trans('main.user.country') !!}" >
                      <option value = "">Select Country</option>
                      @foreach ($countries as $value)
                      <option value="{!! $value->country_code !!}" {{ $country == $value->country_code ? 'selected' : '' }}>{!! $value->country_name !!}</option>
                      @endforeach 
                    </select>
                    @if ($errors->has('country'))
                       <span class="help-block">
                          {{ $errors->first('country') }}
                       </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.state') !!} <span class="astrict">*</span></label>
                    <select class="form-select" name="state" id="state" placeholder="{!! trans('main.user.state') !!}" >
                        <option value="">Select State</option>
                        @foreach($state as $value)
                          <option value="{!! $value->name !!}" {{ $stateval == $value->name ? 'selected' : '' }}>{!! $value->name !!}</option>
                        @endforeach
                    </select>
                    <input class="form-control input-state" type="text" name="state" id="stateother" value="{{ $stateval ?? ''}}">
                    @if ($errors->has('state'))
                       <span class="help-block">
                          {{ $errors->first('state') }}
                       </span>
                    @endif
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.city') !!} <span class="astrict">*</span></label>
                    <input class="form-control" type="text" name="city" id="city" placeholder="{!! trans('main.user.city') !!}" value="{{ $city ?? '' }}">
                    @if ($errors->has('city'))
                       <span class="help-block">
                          {{ $errors->first('city') }}
                       </span>
                    @endif
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.zip') !!} <span class="astrict">*</span></label>
                     <input type="text" class="form-control" name="zip" id="zip" placeholder="{!! trans('main.user.zip') !!}" value="{{ $zip ?? '' }}" required>
                    @if ($errors->has('zip'))
                       <span class="help-block">
                          {{ $errors->first('zip') }}
                       </span>
                    @endif
                  </div>
                </div>

                <div class="row" style="background-color:#d3d3d3;padding-top:12px;font-size: 14px;">
                  <div class="col-md-2"><label class="label-name">{!! trans('main.user.latitude') !!}</label></div>
                  <div class="col-md-4"><label id="latitude">{{ $data->latitude ?? '' }}</label></div>
                  <div class="col-md-2"><label class="label-name">{!! trans('main.user.longitude') !!}</label></div>
                  <div class="col-md-4"><label id="longitude">{{ $data->longitude ?? '' }}</label></div>
                  <input type="hidden" id="latitudeinput" value="{{ $data->latitude ?? '' }}" >
                  <input type="hidden" id="longitudeinput" value="{{ $data->longitude ?? '' }}" >
                </div>

                <input type="hidden" name="status" id="status" value="Pending">
                <input type="hidden" name="submit_status" id="submit_status" value="Pending">
                <input type="hidden" name="user_id" id="user_id" value="{{$user_id ?? $user->id}}">



          </div>
        </section>

        <div class="actions clearfix">
          <ul role="menu" aria-label="Pagination" style="border-bottom: 1px solid #f5f5f4;">
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="save_step1" type="submit" class="btn-submit" >Save</button>
            </li>
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="next_step1">Next</button>
            </li>
          </ul>
        </div>

      </form>
    </div>
<!-- -------------- Step 1 wizard Section End -------------- -->

<!-- -------------- Step 2 wizard Section Start -------------- -->
    <div  id="step2" >
@php
if(empty($data->atmn_certified))
  $atmn_certified = '';
else
  $atmn_certified = date('Y-m-d', strtotime($data->atmn_certified));
@endphp
      <form id="storestep2">
       @csrf
        <section style="padding:40px" role="tabpanel" aria-labelledby="wizard-h-1" class="body current" aria-hidden="false" >
          <h4 class="section-heading">@if($status  == 'Pending')<span style="color:#801214;float: right;">(Pending)</span>@endif @if($status  == 'Approve')<span style="color:green;float: right;">(Approved)</span>@endif</h4>
          <div class="content-wrapper">
            <br>
                <div class="row bar">
                  <label>Minisitry Area</label>
                </div>
                <div class="row">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label class="label-name">I prefer to serve a church <i class="mdi mdi-information-outline" data-toggle="tooltip" title="Please indicate the distance from your present place of permanent residence that you are willing to travel to serve as a transitional pastor."></i> <span class="astrict">*</span> </label>
                    <select name="ministry_area"class="form-select" id="ministry_area" value="{{ $ministry_area_val }}">
                      <option value="">Not Selected</option>
                       @foreach($ministry_area as $value)
                      <option value="{{ $value->name }}" {{ $ministry_area_val == $value->name ? 'selected' : '' }}>{{$value->name}}</option>
                       @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="label-name">Language</label>
                    <div style="margin: 2px 0px 0px 40px;"> 
                      <input type="checkbox" class="form-check-input" id="language" name="language" value="Spanish" {{ $language == "Spanish" ? "Checked" : ""}}><label for="language">Spanish</label>
                    </div>
                  </div>
                </div>
                </div>
                <br>
                <div class="row bar">
                  <label>I Am Not Available</label>
                </div>
                  <br>
                  <div align="right">
                  <button class="btn btn-add m-t-15 waves-effect mb-3" id="myBtn" type="button" style="background-color: #801214;color:#fff;font-size: 12px;" >{!! trans('main.add') !!}</button>
                  </div>
                  <div class="row">
                    <table id="availability" class="table responsive table-hover data-table-availability" style="width:100%;font-size: 14px;">
                      <thead>
                        <tr>
                          <th>Start Date</th>
                          <th>Projected End Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                <br>

                <div class="row bar">
                  <label>Ministry Preferences</label>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="label-name">I am willing to commute</label><br>
                    <div class="row" style="margin-left: 12px;flex-wrap: nowrap;">
                      <span style="width: 70px;">
                        <input type="checkbox" class="form-check-input" name="willing_commute" id="willing_commute" value="Y" {{ $willing_commute == 'Y' ? 'checked' : '' }}/>
                      <label>Yes</label></span>
                      <span style="width: 70px;">
                        <input type="checkbox" class="form-check-input" name="willing_commute" id="willing_commute" value="N" {{ $willing_commute == 'N' ? 'checked' : '' }}/>
                      <label>No</label></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="label-name">I am willing to move onsite with  of arrangements for returning to my home periodically.</label><br>
                    <div class="row" style="margin-left: 12px;flex-wrap: nowrap;">
                      <span style="width: 70px;"><input type="checkbox" class="form-check-input" name="onsite_arrangement" id="onsite_arrangement" value="Y" {{ $onsite_arrangement == 'Y' ? 'checked' : '' }}/>
                      <label>Yes</label></span>
                      <span style="width: 70px;"><input type="checkbox" class="form-check-input" name="onsite_arrangement" id="onsite_arrangement" value="N" {{ $onsite_arrangement == 'N' ? 'checked' : '' }}/>
                      <label>No</label></span>
                      @if ($errors->has('church_comfort_serve'))
                       <span class="help-block">
                          {{ $errors->first('church_comfort_serve') }}
                       </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="label-name">My preferred church size is</label>
                     <select name="comfortable_serving_church" class="form-select" id="comfortable_serving_church" value="{{ $data->comfortable_serving_church ?? '' }}">
                        <option value="">Not Selected</option>
                      @foreach($comfortable_serving_church as $value)
                      <option value="{{ $value->name }}" {{ $comfortable_serving_church_val == $value->name ? 'selected' : '' }}>{{$value->name}}</option>
                       @endforeach
                      </select>
                    @if ($errors->has('comfortable_serving_church'))
                       <span class="help-block">
                          {{ $errors->first('comfortable_serving_church') }}  
                       </span>
                    @endif
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label class="label-name">I prefer to serve a church</label>
                     <select name="prefer_serve_church" class="form-select" id="prefer_serve_church" value="{{ $data->prefer_serve_church ?? '' }}">
                        <option value="">Not Selected</option>
                        @foreach($prefer_serve_church as $value)
                      <option value="{{ $value->name }}" {{ $prefer_serve_church_val == $value->name ? 'selected' : '' }}>{{$value->name}}</option>
                       @endforeach
                      </select>

                    @if ($errors->has('church_prefer'))
                       <span class="help-block">
                          {{ $errors->first('church_prefer') }}
                       </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label class="label-name">I prefer to serve in the following district</label>
                     <select class="form-select" name="prefer_serve_district" id="prefer_serve_district" value="{{ $data->prefer_serve_district ?? ''}}">
                      <option value="">Select District</option>
                      <option value="Any" {{ $prefer_serve_district == 'Any' ? 'selected' : ''}}>Any District</option>
                      @foreach($district as $value)
                      <option value="{!! $value->d_id !!}" {{ $prefer_serve_district == $value->d_id ? 'selected' : ''}}>{!! $value->district !!}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('prefer_serve_district'))
                       <span class="help-block">
                          {{ $errors->first('prefer_serve_district') }}
                       </span>
                    @endif
                  </div>
                </div>
                <br>
          </div>
        </section>

        <div class="actions clearfix">
          <ul role="menu" aria-label="Pagination" style="border-bottom: 1px solid #f5f5f4;">
            <li class="" role="tab" aria-disabled="false">
              <button id="prev_step1">Previous</button>
            </li>
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="save_step2" class="btn-submit">Save</button>
            </li>
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="next_step2">Next</button>
            </li>
          </ul>
        </div>
      </form>  
    </div>
<!-- -------------- Step 2 wizard Section End -------------- -->

<!-- -------------- Step 3 wizard Section Start -------------- -->

    <div  id="step3">
      <form id="storestep3">
        {{ csrf_field() }}
        <section style="padding:40px"  role="tabpanel" aria-labelledby="wizard-h-3" class="body wizard-tab3" aria-hidden="true" >
          <h4 class="section-heading">Training &#38; Certification Details @if($status  == 'Pending')<span style="color:#801214;float: right;">(Pending)</span>@endif @if($status  == 'Approve')<span style="color:green;float: right;">(Approved)</span>@endif</h4><br>
          <div class="content-wrapper">
            <label class="label-name" style="font-size:12px"><strong>Instruction  :</strong> Training is required for certification. Complete the following for any existing training you may have. For more information on getting any needed training email 
            <a href = "mailto: atmn@cmalliance.org">atmn@cmalliance.org</a>.</label>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="label-name">{!! trans('main.user.training') !!} <i class="mdi mdi-information-outline" data-toggle="tooltip" title="Interim Pastor Ministries (IPM), VitalChurch Ministry (VCM), Alliance Transitional Ministry (ATMN) or another training program"></i> <span class="astrict">*</span></label>
                <input type="text" class="form-control" name="training" id="training" placeholder="{!! trans('main.user.training') !!}" value="{{ $data->training ?? '' }}">
                @if ($errors->has('training'))
                   <span class="help-block">
                      {{ $errors->first('training') }}
                   </span>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label class="label-name">{!! trans('main.user.licensing.district') !!} <i class="mdi mdi-information-outline" data-toggle="tooltip" title="This should be the district where you are currently licensed. Ordinarily, this will be the district in which you maintain your permanent residence."></i></label>
                <select class="form-select" name="district_issuing" id="district_issuing" value="{{ $data->district_issuing ?? ''}}">
                  <option value="">Select District</option>
                  @foreach($district as $value)
                  <option value="{!! $value->d_id !!}" {{ $district_issuing == $value->d_id ? 'selected' : ''}}>{!! $value->district !!}</option>
                  @endforeach
                </select>
                @if ($errors->has('district_issuing'))
                   <span class="help-block">
                      {{ $errors->first('district_issuing') }}
                   </span>
                @endif
              </div>
            </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.atmn.certified') !!} <!-- <span class="astrict">*</span> --></label>
                        <input type="date" name="atmn_certified" class="form-control" id="atmn_certified" placeholder="{!! trans('main.user.atmn.certified') !!}" value="{{ $atmn_certified ?? '' }}" >
                        @if ($errors->has('atmn_certified'))
                           <span class="help-block">
                              {{ $errors->first('atmn_certified') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label class="label-name">{!! trans('main.user.peacemaking') !!}</label>
                        <div>
                          <select class="form-select" name="peacemaking" id="peacemaking" value="{{ $data->peacemaking ?? ''}}">
                            <option value="">Select Peacemaking</option>
                            @foreach($peacemaking as $value)
                            <option value="{!! $value->name !!}" {{ $peacemaking_data == $value->name ? 'selected' : ''}}>{!! $value->name !!}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                           <div class="row">
                         <div class="form-group col-md-6">
                        <label class="label-name">Organization Membership</label>
                        <div style="margin: 2px 0px 0px 40px;"> 
                        <input type="checkbox" class="form-check-input" id="interim_pastor_ministries" name="interim_pastor_ministries" value="Y" {{ $ipm == "Y" ? "Checked" : ""}}><label for="language">Interim Pastor Ministries (IPM)</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="label-name"></label>
                        <div style="margin: 13px 0px 0px 40px;"> 
                        <input type="checkbox" class="form-check-input" id="vital_church_ministries" name="vital_church_ministries" value="Y" {{ $vcm == "Y" ?  "Checked" : ""}}><label for="language">Vital Church Ministries (VCM)</label>
                        </div>
                      </div>
                  </div>
                     <input type="hidden" name="license" value="Unassigned">
                    </div>
                  </div>
                </div>
                <br>
            <div class="row">
              <div class="col-md-12">
                <div class="row bar">
                  <label class="label-name">{!! trans('main.user.upload_docs') !!}</label>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <label class="label-name" style="font-size:12px"><strong>Note :</strong> Please upload your self-assessment as well as parts 1 & 2 of the Request for Certification, along with permission to complete a background check. There is also a place for you to upload a copy of your most recent resume. Resumes are not required but they are very helpful to superintendents when they are seeking to match transitional pastors with churches.</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="label-name">Self Assessment</label>
                      </div>
                      <div class="form-group col-md-1">
                        @if($self_assessment == '')
                        <span><a href="{{asset('uploads').'/files/'.'Assessing Your Restoration Potential.pdf' }}" data-toggle="tooltip" title="Click here To download Self Assessment" download><i class="fa fa-download"></i> </a></span>
                        @endif
                        @if($self_assessment != '')
                        <span><a href="{{asset('uploads').'/'.$user_id.'/'.$self_assessment}}" data-toggle="tooltip" title="Click here to download uploaded Self Assessment" download><i class="fa fa-download"></i> </a></span>
                        @endif
                      </div>
                      <div class="form-group col-md-8">
                        <span class="form-control choose-file">
                          <input type="file" id="actual-btn1" class="filechosen" name="fields_1" value="" />
                        </span>
                        <span class="help-block" id="self_assessment"></span>
                        <span class="file-name">
                        @if($self_assessment != '')
                        <a href="{{asset('uploads').'/'.$user_id.'/'.$self_assessment}}" data-toggle="tooltip" title="Click here to download uploaded Self Assessment" download>{{ $self_assessment ?? ''}}</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="label-name">Application Part I </label>
                      </div>
                      <div class="form-group col-md-1">
                        @if($application_part_I == '')
                        <span><a href="{{asset('uploads').'/files/'.'Application_PartI.pdf'}}" data-toggle="tooltip" title="Click here to download Application Part I" download><i class="fa fa-download"></i> </a></span>
                        @endif
                        @if($application_part_I != '')
                        <span><a href="{{asset('uploads').'/'.$user_id.'/'.$application_part_I}}" data-toggle="tooltip" title="Click here to download uploaded Application Part I" download><i class="fa fa-download"></i> </a></span>
                        @endif
                      </div>
                      <div class="form-group col-md-8">
                        <span class="form-control choose-file">
                          <input type="file" id="actual-btn2" class="filechosen" name="fields_2" value=""/>
                        </span>
                        <span class="help-block" id="application_part_I"></span>
                        <span class="file-name">
                          @if($application_part_I != '')
                          <a href="{{asset('uploads').'/'.$user_id.'/'.$application_part_I}}" data-toggle="tooltip" title="Click here to download uploaded Application Part I" download>{{ $application_part_I ?? ''}}</a>
                          @endif
                        </span>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="label-name">Application Part II</label>
                      </div>
                      <div class="form-group col-md-1">
                        @if($application_part_II == '')
                        <span><a href="{{asset('uploads').'/files/'.'Application_PartII.pdf'}}" data-toggle="tooltip" title="Click here to download Application Part II" download><i class="fa fa-download"></i> </a></span>
                        @endif
                        @if($application_part_II != '')
                        <span><a href="{{asset('uploads').'/'.$user_id.'/'.$application_part_II}}" data-toggle="tooltip" title="Click here to download uploaded Application Part II" download><i class="fa fa-download"></i> </a></span>
                        @endif
                      </div>
                      <div class="form-group col-md-8">
                        
                        <span class="form-control choose-file">
                          <input type="file" id="actual-btn3"  class="filechosen" name="fields_3" value="">
                        </span>
                        <span class="help-block" id="application_part_II"></span>
                        <span class="file-name">
                        @if($application_part_II != '')
                        <a href="{{asset('uploads').'/'.$user_id.'/'.$application_part_II}}" data-toggle="tooltip" title="Click here to download uploaded Application Part II" download>{{ $application_part_II ?? ''}}</a>
                        @endif
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="label-name">Background Checks</label>
                      </div>
                      <div class="form-group col-md-1">
                        @if($background_check == '')
                        <span><a href="{{asset('uploads').'/files/'.'BackgroundCheck.pdf'}}" data-toggle="tooltip" title="Click here to download Background Checks" download><i class="fa fa-download"></i> </a></span>
                        @endif
                        @if($background_check != '')
                        <span><a href="{{asset('uploads').'/'.$user_id.'/'.$background_check}}" data-toggle="tooltip" title="Click here to download uploaded Background Checks" download><i class="fa fa-download"></i> </a></span>
                        @endif
                      </div>
                      <div class="form-group col-md-8">
                        <span class="form-control choose-file">
                          <input type="file" id="actual-btn4"  class="filechosen" name="fields_4" value="">
                        </span>
                        <span class="help-block" id="background_check"></span>
                        <span class="file-name">
                        @if($background_check != '')
                        <a href="{{asset('uploads').'/'.$user_id.'/'.$background_check}}" data-toggle="tooltip" title="Click here to download uploaded Background Checks" download>{{ $background_check ?? ''}}</a>
                        @endif
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="label-name">Resume</label>
                      </div>
                      <div class="form-group col-md-1">
                        <span>
                          @if($isUSER == 'ds' && $resume != '' || $isUSER == 'admin' && $resume != '' || $status == "Approve" && $resume != '')
                          <a href="{{asset('uploads').'/'.$user_id.'/'.$resume}}" data-toggle="tooltip" title="Click here to download" download><i class="fa fa-download"></i></a>
                          @endif
                        </span>
                      </div>
                      <div class="form-group col-md-8">
                        <span class="form-control choose-file">
                          <input type="file" id="actual-btn5"  class="filechosen" name="fields_5" value="{{ $resume ?? ''}}">
                        </span>
                        <span class="help-block" id="resume"></span>
                        <span class="file-name">
                          @if($isUSER == 'ds' && $resume != '' || $isUSER == 'admin' && $resume != '' || $status == "Approve" && $resume != '')
                          <a href="{{asset('uploads').'/'.$user_id.'/'.$resume}}" data-toggle="tooltip" title="Click here to download" download>{{ $resume ?? ''}}</a>
                          @endif
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row bar">
                  <label>Accept Agreement and Submit</label>
                </div>
                <br>
                <div class="content-wrapper">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="send_email" id="send_email" value="Y" {{ $data->send_email ?? '' == 'Y' ? 'checked' : '' }}>
                      Email Checkbox (send notification by email or notify on website only)
                    </label>
                  </div>
                </div>
                <br>
                <div class="content-wrapper">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="agree" id="agree" value="Y" {{ $data->agree ?? '' == 'Y' ? 'checked' : '' }}>
                      I hereby declare that I had read all the <a href="{{Route('PrivacyPolicy')}}" target="_blank">terms and conditions</a>  and all the details provided my me in this form are true.
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </section>

        <input type="hidden" name="app_sent" value="{{Carbon\Carbon::now()}}">

        <div class="actions clearfix">
          <ul role="menu" aria-label="Pagination" style="border-bottom: 1px solid #f5f5f4;">
            <li class="" aria-disabled="false">
              <button id="prev_step2">Previous</button>
            </li>
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="save_step3"class="btn-submit">Submit</button>
            </li>
            <li aria-hidden="false" aria-disabled="false" class="" style="display: list-item;">
              <button id="next_step3">Next</button>
            </li>
          </ul>
        </div>
      </form>
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
<!-- -------------- Step 3 wizard Section End -------------- -->

<!-- -------------- Step 4 wizard Section Start -------------- -->

    <div id="step4">
      <section style="padding:40px"  role="tabpanel" aria-labelledby="wizard-h-3" class="body" aria-hidden="true" >
        <h4 class="section-heading">@if($status  == 'Pending')<span style="color:#801214;float: right;">(Pending)</span>@endif @if($status  == 'Approve')<span style="color:green;float: right;">(Approved)</span>@endif</h4><br>
        <div class="content-wrapper">
          <div class="col-md-12">
            <div class="row bar">
                <label>Status History</label>
            </div>
            <br>
            <div class="row">
              <table id="applicationstatushistory" class="table table-hover responsive data-table-statushistory" style="width:100%">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <br>
            @if(!empty($data->comments))
            <div class="row bar">
              <label>Application Status</label>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label class="label-name">{!! trans('main.user.approve_date') !!}</label>
                <br>
                <span>{{ \Carbon\Carbon::createFromTimestamp(strtotime($data->approved_date ?? ''))->format('m-d-Y')}}</span> 
              </div>
              <div class="col-md-4">
                <label class="label-name">Application Status</label>
                <br>
                @if($submit_status == "Approve")
                <span><span style="color:green;">(Approved)</span></span> 
                @endif
                @if($submit_status == "Awaiting")
                <span><span style="color:red;">(Awaiting)</span></span> 
                @endif
                @if($submit_status == "Pending")
                <span><span style="color:red;">(Awaiting)</span></span> 
                @endif
                @if($submit_status == "Declined")
                <span><span style="color:red;">(Declined)</span></span> 
                @endif
              </div>
              <div class="col-md-4">
                <label class="label-name">{!! trans('main.user.approve_by') !!}</label>
                <br>
                <span>{{$data->approved_by ?? ''}}</span>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="label-name">{!! trans('main.user.comments') !!}</label>
                    <br>
                    <span>{{ $data->comments ?? '' }}</span>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if($pastor_assign != '')
            <br>
            <div class="row bar">
              <label>Assignment Status History</label>
            </div>
            <br>
            <div class="row">
              <table id="Assignmentstatushistory" class="table table-hover responsive" style="width:100%">
                <thead>
                  <tr>
                    <th>Church</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Assigned by</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pastorassignHistory as $value)
                    <tr>
                      <td style="width: 180px">{{$value->church_name}}</td>
                      <td style="width: 100px">{{ \Carbon\Carbon::createFromTimestamp(strtotime($value->assign_start_date ?? ''))->format('m-d-Y')}}</td>
                      <td style="width: 100px">{{ \Carbon\Carbon::createFromTimestamp(strtotime($value->assign_end_date ?? ''))->format('m-d-Y')}}</td>
                      <td>{{ATMNHelper::getName($value->assigned_by)}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <div class="row bar">
              <label>Assignment Status</label>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.churches') !!}</label>
                    <br>
                    <span>{{ $pastor_assign->church_name }}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.status') !!}</label>
                    <br>
                    <span style="color:green  ">(Placed)</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.assign_date') !!}</label>
                    <br>
                    <span>{{ \Carbon\Carbon::createFromTimestamp(strtotime($pastor_assign->assigned_at ?? ''))->format('m-d-Y')}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.startdate') !!}</label>
                    <br>
                    <span>{{ \Carbon\Carbon::createFromTimestamp(strtotime($pastor_assign->assign_start_date ?? ''))->format('m-d-Y')}}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.enddate') !!}</label>
                    <br>
                    <span>{{ \Carbon\Carbon::createFromTimestamp(strtotime($pastor_assign->assign_end_date ?? ''))->format('m-d-Y')}}</span>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="label-name">{!! trans('main.user.assignedby') !!}</label>
                    <br>
                    <span>{{ $ds_name->username }}</span>
                  </div>
                </div>
              </div>
            </div>
            @endif

          
 <!--   table comment list view -->
 <br>
          <div class="row bar">
              <label>Comments</label>
            </div>
            <br>
            <div class="row">
            <table id="pastorcomments" class="table table-hover responsive" style="width:100%">
            <thead>
            <tr>
                    <th>Comments</th>
                    <th>Submitted By</th>
                    <th>Updated By</th>
                    <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($commentsData as $value)
            <tr id="commentrow{{$value->id}}">
            <td style="width: 200px">{{$value->comment}}</td>
            <td style="width:100px">{{ATMNHelper::getName($value->submitted_by)}}</td>
            <td style="width: 100px">{{ \Carbon\Carbon::createFromTimestamp(strtotime($value->updated_at ?? ''))->format('m-d-Y')}}</td>

            <td><a href="" class="comment_view" data-id="{{$value->id}}"><i class="fa fa-eye"></i></a>
             </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            <br>
            </div>
            </div>    
            </section>
      <div class="actions clearfix">
        <ul role="menu" aria-label="Pagination" style="border-bottom: 1px solid #f5f5f4;">
          <li class="" aria-disabled="false">
            <button id="prev_step3">Previous</button>
          </li>
          <li class="" aria-disabled="false">
            <a href="{{Route('app.index')}}" style="color: #fff;" onmouseover="">Close</a>
          </li>
        </ul>
      </div>

    </div>
<!-- -------------- Step 4 wizard Section End -------------- -->


     <!-- edit model -->

              <div class="container">
              <!-- Modal -->
              <div class="modal" id="commentsupdate" >
              <div class="modal-dialog modal-md modal-centered">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color:#801214;color: #fff;">
                    <h4><span id="viewcomment">View Comments</span></h4>
                    <button type="button" id="CloseModalview" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <form id="updatecommentForm">  
                @csrf                                                    
                <div class="modal-body">
                <input type="hidden" name="commentspastor_id" id="commentspastor_id" value="">
                <input type="hidden" name="submitted_by" id="submitted_by" value="{{ Auth::user()->id }}">
                
                <div class="row">
                  <div class="form-group col-md-12">
                    <label class="label-name">{!! trans('main.user.comments') !!} <span class="astrict">*</span></label>
                   <!--  <input class="form-control" type="text" name="comments" id="comments" value=""> -->
                   <textarea name="comment" class="form-control" id="commentdata">{{ $comment ?? '' }}</textarea>
                    @if ($errors->has('reason'))
                       <span class="help-block">     <!-- {{ $reason ?? '' }} -->
                          {{ $errors->first('reason') }}
                       </span>
                    @endif
                  </div>
                </div>
                </div>
                <div class="modal-footer">
               <button class="btn m-t-15 waves-effect mb-3" id="close" type="button">{!! trans('main.close') !!}</button>
                </div>
                </form>
              </div>
              </div>
              </div>
              </div>
  </div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

  // My Availability data to the datatables
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var availability_table = $('.data-table-availability').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('app.pastor.availabe.index',array(ATMNHelper::encryptUrl(Auth::user()->id))) }}",
      columns: [
          {data: 'start_date', name: 'Start Date',
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear() ; 
                //return date;
            }
          },
          {data: 'end_date', name: 'End Date',
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear() ; 
                //return date;
            }
          },
          {data: 'action', name: 'action',ordering:false},
      ]
    });

    var status_history_table = $('.data-table-statushistory').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('statushistory',array(ATMNHelper::encryptUrl(Auth::user()->id))) }}",
      columns: [
          {data: 'date', name: 'Date',
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1 ;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear() +" "+ formatAMPM(date); 
            }
          },
          {data: 'status', name: 'Status'}
      ]
    });

function formatAMPM(date) { // This is to display 12 hour format like you asked
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}


  //add Class to highlight the wizard nav  
  const thePath = window.location.hash;

  // Phone Number mask jquery
  const obj =  {
          "home_phone": home_phone,
          "cell_phone": cell_phone,
          "office_phone": office_phone
        }
  $.each(obj, function(value) {
      document.getElementById(value).addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
        e.target.value = '(' +x[1] + ') '+ x[2] + '-' + x[3];
      });
  });

  var $checks1 = $('input[type="checkbox"][name="status"]');
  $checks1.click(function() {
     $checks1.not(this).prop("checked", false);
  });

  var $checks2 = $('input[type="checkbox"][name="willing_commute"]');
  $checks2.click(function() {
     $checks2.not(this).prop("checked", false);
  });

  var $checks3 = $('input[type="checkbox"][name="onsite_arrangement"]');
  $checks3.click(function() {
     $checks3.not(this).prop("checked", false);
  });

// insert button feature


$(function() {
    jQuery.validator.addMethod(
      "regex",
       function(value, element, regexp) {
           if (regexp.constructor != RegExp)
              regexp = new RegExp(regexp);
           else if (regexp.global)
              regexp.lastIndex = 0;
              return this.optional(element) || regexp.test(value);
       },"erreur expression reguliere"
    );

    jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/);
    },'The email should be in the format: abc@gmail.com');

     

    $.validator.addMethod('filesize', function(value, element, arg) {
  if (this.optional(element))
    return;

  if (element.files[0].size <= arg) {
    return true;
  } else {
    return false;
  }
});

    $("#storestep1").validate({
         rules: {
      first_name : {
        required: true,
        regex:/^[a-zA-Z]+$/,
        minlength: 3
      },
      last_name : {
        required: true,
        regex:/^[a-zA-Z]+$/,
        minlength: 3
      },
      district_id:{
        required: true,
      },
      street1: {
        required: true,
        maxlength:50,
      },
      city: {
        required: true,
        maxlength:50,
      },
      state: {
        required: true,
        maxlength:50,
      },
      country: {
        required: true,
        maxlength:50,
      },
      zip: {
        required: true,
        number: true,
        minlength: 5,
        maxlength:6,
      },
      home_phone: {
         "regex": /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/,
        minlength: 10,
      },
      cell_phone: {
        "regex": /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/,
        minlength: 10,
      },
      office_phone: {
         "regex": /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/,
        minlength: 10,
      },
      email: {
        required: true,
        email: true,
        accept: true,
        maxlength:100,
      },
    },
    messages : {
      first_name: {
        required: "Please enter your first name",
        regex:"Only letters allowed, no numbers or special characters",
        minlength: "Name should be at least 3 characters"
      },
      last_name: {
        required: "Please enter your last name",
        regex:"Only letters allowed, no numbers or special characters",
        minlength: "Name should be at least 3 characters"
      },
      district_id:{
        required: "Please select district",
      },
      email: {
        required: "Please enter your email"
      },
      home_phone: {
        regex: "Please enter a valid phone number",
        minlength: "Please enter 10 digit numbers",
      },
      cell_phone: {
        regex: "Please enter a valid phone number",
       minlength: "Please enter 10 digit numbers",
      },
      office_phone: {
        regex: "Please enter a valid phone number",
        minlength: "Please enter 10 digit numbers",
      },
      street1: {
        required: "Please enter street address"
      },
        city: {
        required: "Please enter city address"
      },
        state: {
        required: "Please select state"
      },
        country: {
        required: "Please enter country"
      },
        zip: {
        required: "Please enter zip",
        number:  "Please enter only numbers",
      },
    },
    });
    $("#storestep2").validate({
        rules: {
          ministry_area : {
            required: true,
          },
          district_id : {
            required: true,
          },
        },
        messages : {
          ministry_area: {
           required: "Please select prefer to serve a church",
            minlength: "Name should be at least 3 characters",
          },
          district_id: {
           required: "Please select your district",
          },
        }
    });

    $("#storestep3").validate({
       rules: {
        training : {
          required: true,
          minlength: 3
        },
        agree : {
          required: true,
        },
        fields_1: {
          extension: "pdf",
        },
        fields_2: {
          extension: "pdf",
        },
        fields_3: {
          extension: "pdf",
        },
        fields_4: {
          extension: "pdf",
        },
        fields_5: {
           extension: "doc|pdf|docx",
           // filesize: 2000000,
        },

      },
      messages : {

        training: {
         required: "Please enter training details",
        },
        agree: {
         required: "Please check this box if you want to proceed",
        },
        fields_1: {
          "extension": "You can upload only .pdf extension file"
        },
        fields_2: {
          "extension": "You can upload only .pdf extension file"
        },
        fields_3: {
          "extension": "You can upload only .pdf extension file"
        },
        fields_4: { 
          "extension": "You can upload only .pdf extension file"
        },
        fields_5: {
          "extension": "You can upload only pdf,doc,docx extensions files"
        },
      },
    });
    $("#storestep4").validate({
      rules: {
    submit_status : {
      required: true,
    },
  },
  messages : {
    submit_status: {
      required: "Please select Status",
    },
  },
    });

});

// second page
   $("#prev_step1").click(function(e) {      
    e.preventDefault();
    var value = $("#ministry_area").val();
    if( value != ''){
        var formID = "storestep2";
        var url ="{{ route('app.step.two.post') }}";
        var type = 'POST';
        var previous = 'step1';
        AtmnWizardprevious(formID, url, type,previous);
    }else{
            $("#one").addClass("current");
            $("#two").removeClass("current");
            $("#three").removeClass("current");
            $("#four").removeClass("current");
            $('#step1').show();
            $('#step2').hide();
            $('#step3').hide();
            $('#step4').hide();

    }
      
      });
  $("#prev_step2").click(function(e) {
     e.preventDefault(); 
            var value = $("#training").val();
            if( value != '') {
            var formID = "storestep3";
            var type = 'POST';
            var url = "{{ route('app.step.three.post') }}";

            var file1 = $('#actual-btn1')[0].files;
            var file2 = $('#actual-btn2')[0].files;
            var file3 = $('#actual-btn3')[0].files;
            var file4 = $('#actual-btn4')[0].files;
            var file5 = $('#actual-btn5')[0].files;
            var previous = 'step2';

            let fileArr = [file1, file2, file3, file4, file5];
            console.log(fileArr);
            let fileNameArr = ["self_assessment", "application_part_I", "application_part_II", "background_check", "resume"];
            fileArr.map((file, i) => {
                let files = file;
                let fileNames = fileNameArr[i];
                if (files.length > 0) {
                    fileUpload(files, fileNames);
                } 
            });

         AtmnWizardprevious(formID, url, type,previous);
          }
          else{
          $("#one").removeClass("current");
          $("#two").addClass("current");
          $("#three").removeClass("current");
          $("#four").removeClass("current");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
          }
      }); 

// firststep Nextbutton
  $("#next_step1").click(function(e) {
  e.preventDefault();  
    $('#storestep1').validate();
          if($('#storestep1').valid()){
            var formID = "storestep1";
            var url ="{{ route('app.step.one.post') }}";
            var type = 'POST';
            AtmnWizard(formID, url, type);
          }
      });

   $("#next_step2").click(function(e) {
    e.preventDefault();
    $('#storestep2').validate();
          if($('#storestep2').valid()){
            var formID = "storestep2";
            var url ="{{ route('app.step.two.post') }}";
            var type = 'POST';
            AtmnWizard(formID, url, type);
          }
     });

     $("#next_step3").click(function(e) { 
     e.preventDefault();
         $('#storestep3').validate();
          if($('#storestep3').valid()){
        var formID = "storestep3";
        var type = 'POST';
        var url = "{{ route('app.step.three.post') }}";

        var file1 = $('#actual-btn1')[0].files;
        var file2 = $('#actual-btn2')[0].files;
        var file3 = $('#actual-btn3')[0].files;
        var file4 = $('#actual-btn4')[0].files;
        var file5 = $('#actual-btn5')[0].files;


        let fileArr = [file1, file2, file3, file4, file5];
        console.log(fileArr);
        let fileNameArr = ["self_assessment", "application_part_I", "application_part_II", "background_check", "resume"];
        fileArr.map((file, i) => {
            let files = file;
            let fileNames = fileNameArr[i];
            if (files.length > 0) {
                fileUpload(files, fileNames);
            } 
        });

        AtmnWizard(formID, url, type);
    }
    
  });

     // savebuttons

     
      $("#save_step1").click(function(e) {
  e.preventDefault();  
    $('#storestep1').validate();
          if($('#storestep1').valid()){
            var formID = "storestep1";
            var url ="{{ route('app.step.one.post') }}";
            var type = 'POST';
            AtmnWizard(formID, url, type);
          }
      });

      $("#save_step2").click(function(e) {
    e.preventDefault();
    $('#storestep2').validate();
          if($('#storestep2').valid()){
            var formID = "storestep2";
            var url ="{{ route('app.step.two.post') }}";
            var type = 'POST';
            AtmnWizard(formID, url, type);
          }
     });

        $("#save_step3").click(function(e) { 
     e.preventDefault();
         $('#storestep3').validate();
          if($('#storestep3').valid()){
        var formID = "storestep3";
        var type = 'POST';
        var url = "{{ route('app.step.three.post') }}";

        var file1 = $('#actual-btn1')[0].files;
        var file2 = $('#actual-btn2')[0].files;
        var file3 = $('#actual-btn3')[0].files;
        var file4 = $('#actual-btn4')[0].files;
        var file5 = $('#actual-btn5')[0].files;


        let fileArr = [file1, file2, file3, file4, file5];
        console.log(fileArr);
        let fileNameArr = ["self_assessment", "application_part_I", "application_part_II", "background_check", "resume"];
        fileArr.map((file, i) => {
            let files = file;
            let fileNames = fileNameArr[i];
            if (files.length > 0) {
                fileUpload(files, fileNames);
            } 
        });

        AtmnWizard(formID, url, type);
    }
    
  });


var appStatus = "{{ $status }}";
function fileUpload(files,field){
  var fd = new FormData();
  // Append data 
  fd.append(''+field+'',files[0]);
  // AJAX request 
  $.ajax({
    url: "{{route('pageUploadFile',array(ATMNHelper::encryptUrl(@$user_id ?? '')))}}",
    method: 'post',
    data:fd,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function(response){
      let data = response;
      let fileId = data['file_id'];
      let $fileId = $("#"+fileId+""); 
      let name = fileId;
      if(data['error']){
        let message = fileId !="resume" ? "Only pdf file format is allowed" : "Only files with the following extensions are allowed: pdf, doc and docx";
        $fileId.empty().append(""+message+"");
      }
    },
    error: function(response){
      console.log("error : " + JSON.stringify(response) );
    }
  });
}

  $("#myAvailableForm").validate({
    rules: {
      start_date : {
        required: true,
      },
      end_date : {
        required: true,
      },
      
    },
    messages : {
      start_date: {
       required: "Please select start date",
      },
      end_date: {
       required: "Please select end date",
      },
    },
    submitHandler: function(form) {
    var thisForm = $(form);
    var formID =  thisForm.attr("id");

    var availableId = $('#unavailabeid').val();
    if(availableId == ""){
      var url ="{{ route('app.pastor.availabe.post') }}";
    }else{
      var url ="{{ route('app.pastor.availabe.update') }}";
    }
    AtmnWizard(formID, url);
    }
  });

/*------- Auto load Home Address -----*/
  
  var country = $("#country").val();
  var statename = $("#state").val();
  if(country == 'US'){
    $("#stateother").attr('disabled','disabled'); 
  }
  if(country != 'US'){
    $("#state").addClass("select-state");
    $("#stateother").removeClass("input-state");
    $("#state").attr('disabled','disabled'); 
  }

  $("#country").on('change',function() {
    var country = $("#country").val();
    var getVal = 'country';
    if(country != 'US'){
      $("#state").addClass("select-state");
      $("#stateother").removeClass("input-state");
      $("#stateother").removeAttr('disabled');
      $("#state").attr('disabled','disabled'); 
    }else{
      $("#state").removeClass("select-state");
      $("#stateother").addClass("input-state");
      $("#state").removeAttr('disabled');
      $("#stateother").attr('disabled','disabled'); 
      // getlocations(country,getVal);
    }
  });

  $('#zip').on("change", function () {

    var street1 = $('#street1').val();
    var country = $('#country').val();
    var state = $('#state').val();
    var city = $('#city').val();
    var zip = $('#zip').val();

    var address = ""+street1+" "+city+","+state+" "+country+","+zip+""; // Address
    var data = {
        'address' : address
    }
    console.log(data);
    $.ajax({
      method : "post",
      url: "{{ route('getgeocode') }}",
      data : data,
      headers: {
        "accept": "application/json",
        "Access-Control-Allow-Origin":"*",
      },
      success: function(response) {
        console.log(response);
        $( "#latitude" ).empty().append(response.geocode['latitude']);
        $( "#latitudeinput" ).empty().append('<input type="hidden" name="latitude" value="'+response.geocode['latitude']+'">');
        $( "#longitude" ).empty().append(response.geocode['longitude']);
        $( "#longitudeinput" ).empty().append('<input type="hidden" name="longitude" value="'+response.geocode['longitude']+'">');
      },
    });
  });


function getlocations(location,field){
  var field = field; // Address
  var data = {'field' : field,'address_data' : location};
  $.ajax({
    method : "post",
    url: "{{ route('getlocations') }}",
    data : data,
      success: function(response) {
        if(response.state != ''){
          $('#state').empty();
         $('#state').append('<option value="">Select State</option>');
          $.each (response.state, function (data) {
            $('#state').append('<option value = "'+response.state[data]+'" {{ $stateval == "'+response.state[data]+'" ? "selected" : "" }}>'+response.state[data]+'</option>');
          });
        }
      }
   });
}


/*------- End Auto load Home Address-----*/

/*------- myAvailableForm toggle close -------*/

  $("#myBtn").click(function() {
      $('#myModal').appendTo("body").modal('toggle');
      $('#myAvailableForm').trigger("reset");
      $('#EditSpan').hide();
      $('#myAvailableBtn').show();
      $('#myAvailableUpdateBtn').hide();
      startdate = "start_date";
      enddate = "end_date";
      getvalstart = "";
      getvalend = "";
      daterestriction(startdate,enddate,getvalstart,getvalend);

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

/*------- end myAvailableForm toggle close -------*/

/*------- myAvailableDel toggle close -------*/

  $("#Del").click(function() {
      $('#myModalDel').appendTo("body").modal('toggle');
  });
  $("#closeModalDel").click(function() {
      $('#myModalDel').modal('hide');
  });
  $("#CloseModalDel").click(function() {
      $('#myModalDel').modal('hide'); 
  });
  $("#myAvailableBtnDel").click(function() {
       
  });


/*------- end myAvailableForm toggle close -------*/

  
});


/*Tab Hide / Show start*/
    var step_three_disable      =   $("#stepthreedisable").val();
    var step_two_disable        =   $("#steptwoshow").val();
    var step_one_disable        =   $("#stepthreeshow").val();
    var step_all_show           =   $("#stepallshow").val();
    var step_all_show_submit    =   $("#stepallshowsubmit").val();
    var step_all_show_approve   =   $("#stepallshowapprove").val();

    if(step_three_disable == 1){        
        $("#one").addClass("current");
        $("#tab1").addClass("process");
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();

        $("#contact_details").prop('disabled',true);
        $("#my_availability").prop('disabled',true);
        $("#submit").prop('disabled',true);
        $("#next_step2").attr('style','display:none')
        // $('html,body').animate({scrollTop:0},2000);
    }
    if(step_two_disable == 2){
        $("#one").removeClass("current");
        $("#two").addClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("process");
        $('#step1').hide();
        $('#step2').show();
        $('#step3').hide();
        $('#step4').hide();

        $("#personal_info").click(function() {
          $("#one").addClass("current");
          $("#two").removeClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
        });

        $("#contact_details").click(function() {
          $("#one").removeClass("current");
          $("#two").addClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
        });

        $("#my_availability").prop('disabled',true);
        $("#submit").prop('disabled',true);
        $("#next_step3").attr('style','display:none')
        // $('html,body').animate({scrollTop:0},2000);
    }
    if(step_one_disable == 3){
        $("#two").removeClass("current");
        $("#three").addClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("process");
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
        $('#step4').hide();

      $("#personal_info").click(function() {
          $("#one").addClass("current");
          $("#two").removeClass("current");
          $("#three").removeClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("submitted");
          $("#tab3").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
      });

      $("#contact_details").click(function() {
        $("#one").removeClass("current");
        $("#two").addClass("current");
        $("#three").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab2").removeClass("process");
        $("#tab3").addClass("process");
        $('#step1').hide();
        $('#step2').show();
        $('#step3').hide();
        $('#step4').hide();
      });

      $("#my_availability").click(function() {
        $("#three").addClass("current");
        $("#two").removeClass("current");
        $("#one").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab3").removeClass("process");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("process");
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
        $('#step4').hide();
      });

      $("#submit").prop('disabled',true);
      $("#next_step4").attr('style','display:none')
      // $('html,body').animate({scrollTop:0},2000);
    }
    if(step_all_show == 4){
        $("#four").addClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').show();

    $("#personal_info").click(function() {
        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
      });

      $("#contact_details").click(function() {
        $("#one").removeClass("current");
        $("#two").addClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").removeClass("process");
        $("#tab3").removeClass("process");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
      });

      $("#my_availability").click(function() {
        $("#one").removeClass("current");
        $("#two").removeClass("current");
        $("#three").addClass("current");
        $("#four").removeClass("current");
        $("#tab2").removeClass("process");
        $("#tab3").removeClass("process");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').hide();
          $('#step3').show();
          $('#step4').hide();
      });

      $("#submit").click(function() {
        $("#one").removeClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").addClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').show();
      });
    }
    if(step_all_show_submit == 5){
        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
        $('#step1').show();
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();

    $("#personal_info").click(function() {
        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab3").removeClass("process");
        $('#step1').show();
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();
    });

    $("#contact_details").click(function() {
      $("#one").removeClass("current");
      $("#two").addClass("current");
      $("#three").removeClass("current");
      $("#four").removeClass("current");
      $("#tab3").removeClass("process");
      $('#step1').hide();
      $('#step2').show();
      $('#step3').hide();
      $('#step4').hide();
    });

    $("#my_availability").click(function() {
      $("#one").removeClass("current");
      $("#two").removeClass("current");
      $("#three").addClass("current");
      $("#four").removeClass("current");
      $('#step1').hide();
      $('#step2').hide();
      $('#step3').show();
      $('#step4').hide();
    });

    $("#submit").click(function() {
      $("#one").removeClass("current");
      $("#two").removeClass("current");
      $("#three").removeClass("current");
      $("#four").addClass("current");
      $('#step1').hide();
      $('#step2').hide();
      $('#step3').hide();
      $('#step4').show();
    });
  } 

    if(step_all_show_approve == 6){

        $("input[name='status']").attr("disabled","disabled");
        // $(".wizard-tab3 input").attr("disabled","disabled");
        // $(".wizard-tab3 select").attr("disabled","disabled");
        // $("select").attr("disabled","disabled");
        // $("input:file").attr("disabled","disabled");

        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("submitted");
        $('#step1').show();
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();

    $("#personal_info").click(function() {
        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $('#step1').show();
        $('#step2').hide();
        $('#step3').hide();
        $('#step4').hide();
    });

    $("#contact_details").click(function() {
      $("#one").removeClass("current");
      $("#two").addClass("current");
      $("#three").removeClass("current");
      $("#four").removeClass("current");
      $('#step1').hide();
      $('#step2').show();
      $('#step3').hide();
      $('#step4').hide();
    });

    $("#my_availability").click(function() {
      $("#one").removeClass("current");
      $("#two").removeClass("current");
      $("#three").addClass("current");
      $("#four").removeClass("current");
      $('#step1').hide();
      $('#step2').hide();
      $('#step3').show();
      $('#step4').hide();
    });

    $("#submit").click(function() {
      $("#one").removeClass("current");
      $("#two").removeClass("current");
      $("#three").removeClass("current");
      $("#four").addClass("current");
      $('#step1').hide();
      $('#step2').hide();
      $('#step3').hide();
      $('#step4').show();
    });
}



// fourth page
  $("#prev_step3").click(function(e) {
     e.preventDefault();
    $("#one").removeClass("current");
    $("#two").removeClass("current");
    $("#three").addClass("current");
    $("#four").removeClass("current");
    $('#step1').hide();
    $('#step2').hide();
    $('#step3').show();
    $('#step4').hide();
  });


$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


$('.data-table-availability').on('click','.myBtn',function() { 
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
   myAvailablityView(id,data);
    $('#myAvailableBtn').show();
    $('#myAvailableUpdateBtn').hide();   
});

$('.data-table-availability').on('click','.myBtnshow',function() { 
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

$('.data-table-availability').on('click','.myBtnedit',function() { 
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
    myAvailablityView(id,data);
    $('#myAvailableUpdateBtn').show();
    $('#myAvailableBtn').hide();
});


function myAvailablityView(id,data){
  var id = data; // id
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
      startdate = "start_date";
      enddate = "end_date";
      getvalstart = response.unavailabeData['start_date'];
      getvalend = response.unavailabeData['end_date'];
      daterestriction(startdate,enddate,getvalstart,getvalend);
    }
  });
  $('#myModal').appendTo("body").modal('toggle');
  $('#AddSpan').hide();
}

$('.data-table-availability').on('click','.myBtndel',function() {
    var id = $(this).attr('id');
    var data = $(this).attr('data-id');
    myAvailablityDel(id,data);
});

$("#Assignmentstatushistory").DataTable({
       
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


    // table list view

     $("#pastorcomments").DataTable({
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

$("#close").click(function() {
  $('#commentsupdate').modal('hide');
  $("textarea#commentdata").html('');
  $('#pastorcommentform').trigger("reset");
  $('#viewcomment').show();
  $("textarea").removeAttr("disabled","disabled");

});

$("#CloseModalview").click(function() {
  $('#commentsupdate').modal('hide');
  $("textarea#commentdata").html('');
  $('#pastorcommentform').trigger("reset");
  $('#viewcomment').show();
  $("textarea").removeAttr("disabled","disabled");

});
 $("#closeDel").click(function() {
          $('#commentDel').modal('hide');
          });
 // view comments

$(".comment_view").click(function(e){
e.preventDefault();
var Data = $(this).data("id");
$.ajax(
     {
        url: "{{ route('commentview') }}",
        type: 'get',
        data: {
          id: Data
        },
        success: function (response){
          
          $('#commentsupdate').appendTo("body").modal('toggle');
          $('#commentspastor_id').val(Data);
          $( "textarea#commentdata" ).append(response.commentview['comment']);
          $("textarea[name='comment']").attr("disabled","disabled");
        }
     });
 });


  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

$('#myAvailableBtnDel').on('click',function(e) {
  e.preventDefault();
    var id = $("#id").val();
    var token = $("meta[name='csrf-token']").attr("content");
    var data = {
      'id' : id,
      "_token": token,
      };
    $.ajax({
    method : "post",
    url: "{{ route('app.pastor.availabe.data.delete') }}",
    data : data,
      success: function(response) {
        console.log(response.unavailabeData);
        $('#myModalDel').modal('hide');
        swal("Success!", "Your Availability Deleted Successfully!", "success");
        availability_table.draw();
      }
   });
});

function myAvailablityDel(id,data){
  var id = data; // Address
  var data = {'id' : id};
  $.ajax({
    method : "GET",
    url: "{{ route('app.pastor.availabe.data') }}",
    data : data,
      success: function(response) {
        console.log(response);
        $('#id').empty().val(response.unavailabeData['id']);
      }
   });
  $('#myModalDel').appendTo("body").modal('toggle');
}



function AtmnWizard(formId, url){
 
  var formData = $("#"+formId+"").serializeArray();
  console.log(formData);
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      success: function(response) {
         // console.log(response.success);
        if(response.success == 'storestep2'){
          swal("Application Step One Submitted Successfully");
          $("#one").removeClass("current");
          $("#tab1").removeClass("process");
          $("#two").addClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();

        $("#personal_info").click(function() {
          $("#one").addClass("current");
          $("#two").removeClass("current");
          $("#tab1").addClass("submitted");;
          $("#tab2").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
        });

        $("#contact_details").click(function() {
          $("#one").removeClass("current");
          $("#two").addClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
        });

          $("#my_availability").prop('disabled',true);
          $("#submit").prop('disabled',true);
          $("#next_step3").attr('style','display:none')
        }
        if(response.success == 'storestep3'){
          swal("Application Step two Submitted Successfully");
            $("#two").removeClass("current");
            $("#tab2").removeClass("process");
            $("#three").addClass("current");
            $("#tab1").addClass("submitted");
            $("#tab2").addClass("submitted");
            $("#tab3").addClass("process");
            $('#step1').hide();
            $('#step2').hide();
            $('#step3').show();
            $('#step4').hide();

        $("#personal_info").click(function() {
          $("#one").addClass("current");
          $("#two").removeClass("current");
          $("#three").removeClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("submitted");
          $("#tab3").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
        });

        $("#contact_details").click(function() {
          $("#one").removeClass("current");
          $("#two").addClass("current");
          $("#three").removeClass("current");
          $("#tab1").addClass("submitted");
          $("#tab2").addClass("submitted");
          $("#tab2").removeClass("process");
          $("#tab3").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
        });

      $("#my_availability").click(function() {
        $("#three").addClass("current");
        $("#two").removeClass("current");
        $("#one").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("process");
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
        $('#step4').hide();
      });

          $("#submit").prop('disabled',true);
          $("#next_step4").attr('style','display:none')
        }
      if(response.success == 'storestep4'){
          swal("Success!", "Application Submitted Successfully", "success");
          //status_history_table.draw();
            $("#three").removeClass("current");
            $("#tab3").removeClass("process");
            $("#four").addClass("current");
            $("#tab1").addClass("submitted");
            $("#tab2").addClass("submitted");
            $("#tab3").addClass("submitted");
            $("#tab4").addClass("process");
              $('#step1').hide();
              $('#step2').hide();
              $('#step3').hide();
              $('#step4').show();

      $("#personal_info").click(function() {
        $("#one").addClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab3").removeClass("process");
        $("#tab2").removeClass("process");
        $("#tab4").addClass("process");
          $('#step1').show();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').hide();
      });

      $("#contact_details").click(function() {
        $("#one").removeClass("current");
        $("#two").addClass("current");
        $("#three").removeClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab2").removeClass("process");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();
      });

      $("#my_availability").click(function() {
        $("#one").removeClass("current");
        $("#two").removeClass("current");
        $("#three").addClass("current");
        $("#four").removeClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab3").removeClass("process");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').hide();
          $('#step3').show();
          $('#step4').hide();
      });

      $("#submit").click(function() {
        $("#one").removeClass("current");
        $("#two").removeClass("current");
        $("#three").removeClass("current");
        $("#four").addClass("current");
        $("#tab1").addClass("submitted");
        $("#tab2").addClass("submitted");
        $("#tab3").addClass("submitted");
        $("#tab4").addClass("process");
          $('#step1').hide();
          $('#step2').hide();
          $('#step3').hide();
          $('#step4').show();
      });
        }
        if(response.success == 'success'){
          window.location.href= "{{Route('app.index')}}";
        }
        if(response.success == 'addAvailability'){
          $('#myModal').modal('hide');
          swal("Success!", "Your Availability Added Successfully!", "success");
          availability_table.draw();
          }
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
$('[data-toggle="tooltip"]').tooltip();    




function AtmnWizardprevious(formId, url, type,previous){ 
  var formData = $("#"+formId+"").serializeArray();
    $.ajax({
      type: type,
      url: url,
      data: formData,
      success: function(response) {
          // alert('in'); 
        if(previous == "step1"){
            swal("Application Step two Submitted Successfully");
            $("#one").addClass("current");
            $("#two").removeClass("current");
            $("#three").removeClass("current");
            $("#four").removeClass("current");
            $('#step1').show();
            $('#step2').hide();
            $('#step3').hide();
            $('#step4').hide();

            $("#submit").prop('disabled',true);
        }
        if(previous == "step2"){
         swal("Success!", "Application Submitted Successfully", "success");
          $("#one").removeClass("current");
          $("#two").addClass("current");
          $("#three").removeClass("current");
          $("#four").removeClass("current");
          $('#step1').hide();
          $('#step2').show();
          $('#step3').hide();
          $('#step4').hide();

        }

      }
  });
}


/*Tab Hide / Show Ends*/
</script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>


@endsection