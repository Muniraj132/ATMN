@extends('frontend.layouts.main')
@section('content')

@php 
$mainkey=rand(0, 99999);
use App\Helpers\ATMNHelper;
@endphp
<style type="text/css">

</style>
<div class="col-md-9">
      <div class="tab-content" id="v-pills-tabContent">
     
    @if(isset($data))
        <form  action="{{ route('app.update', ATMNHelper::encryptUrl(@$data->id)) }}" role="form" class="php-email-form">
            @method('put')
    @else
        <form method="post" action="{{ route('app.store') }}" role="form" class="php-email-form"> 
    @endif
        @csrf
        <select class="select-district" name="district_id" value="{{ $data->d_id ?? ''}}">
                <option>Select District</option>
                @foreach($district as $value)
                <option value="{!! $value->d_id !!}">{!! $value->district !!}</option>
                @endforeach
         </select>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7 col-sm-7">
                        <label class="label-name">{!! trans('main.user.last.name') !!} <span class="astrict">*</span></label>
                        <input disabled="disabled" type="text" name="last_name" class="form-control" id="last_name" placeholder="{!! trans('main.user.last.name') !!}" value="{{ $data->last_name ?? '' }}">
                        <input disabled="disabled" type="hidden" name="mainkey" class="form-control" id="mainkey" placeholder="" value="{{ $data->mainkey ?? @$mainkey }}">
                        @if ($errors->has('last_name'))
                           <span class="help-block">
                              {{ $errors->first('last_name') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.home.phone') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="home_phone" id="home_phone" placeholder="{!! trans('main.user.home.phone') !!}" value="{{ $data->home_phone ?? '' }}">
                        @if ($errors->has('home_phone'))
                           <span class="help-block">
                              {{ $errors->first('home_phone') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.first.name') !!} <span class="astrict">*</span></label>
                        <input disabled="disabled" type="text" name="first_name" class="form-control" id="first_name" placeholder="{!! trans('main.user.first.name') !!}" value="{{ $data->first_name ?? '' }}">
                        @if ($errors->has('first_name'))
                           <span class="help-block">
                              {{ $errors->first('first_name') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.cell.phone') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="cell_phone" id="cell_phone" placeholder="{!! trans('main.user.cell.phone') !!}" value="{{ $data->cell_phone ?? '' }}">
                        @if ($errors->has('cell_phone'))
                           <span class="help-block">
                              {{ $errors->first('cell_phone') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.app.title') !!} <span class="astrict">*</span></label>
                        <input disabled="disabled" type="text" name="title" class="form-control" id="title" placeholder="{!! trans('main.user.app.title') !!}" value="{{ $data->title ?? '' }}">
                        @if ($errors->has('title'))
                           <span class="help-block">
                              {{ $errors->first('title') }}
                           </span>
                        @endif
                      </div>
                       <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.office.phone') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="office_phone" id="office_phone" placeholder="{!! trans('main.user.office.phone') !!}" value="{{ $data->title ?? '' }}">
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
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.status') !!}</label>
                        <select name="status" class="form-select" value="{{ $data->status ?? '' }}" disabled="disabled">
                          <option>Not Selected</option>
                          <option>Assigned Interim</option>
                          <option>Assigned - Sr.app</option>
                          <option>Unassigned</option>
                          <option>Inquiry</option>
                          <option>Withdrawn</option>
                          <option>Not Approved</option>
                          <option>Advisory</option>
                          <option selected>Pending</option>
                        </select>
                        <input disabled="disabled" type="hidden" name="status" value="Pending">
                        @if ($errors->has('status'))
                           <span class="help-block">
                              {{ $errors->first('status') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.training') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="training" id="training" placeholder="{!! trans('main.user.training') !!}" value="{{ $data->training ?? '' }}">
                        @if ($errors->has('training'))
                           <span class="help-block">
                              {{ $errors->first('training') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col form-group col-md-3.5">
                        <label class="label-name">{!! trans('main.user.app.sent') !!}</label>
                        <input disabled="disabled" type="date" name="app_sent" class="form-control" id="app_sent" placeholder="{!! trans('main.user.app.sent') !!}"  value="{{ $data->app_sent ?? '' }}">
                        @if ($errors->has('app_sent'))
                           <span class="help-block">
                              {{ $errors->first('app_sent') }}
                           </span>
                        @endif
                      </div>
                      <div class="col form-group col-md-3.5">
                        <label class="label-name">{!! trans('main.user.app.received') !!}</label>
                        <input disabled="disabled" type="date" name="app_received" class="form-control" id="app_received" placeholder="{!! trans('main.user.app.received') !!}" value="{{ $data->app_received ?? '' }}">
                        @if ($errors->has('app_received'))
                           <span class="help-block">
                              {{ $errors->first('app_received') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.church.serving') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="church_serving" id="" placeholder="{!! trans('main.user.church.serving') !!}" value="{{ $data->church_serving ?? '' }}">
                        @if ($errors->has('church_serving'))
                           <span class="help-block">
                              {{ $errors->first('church_serving') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col form-group col-md-3.5">
                        <label class="label-name">{!! trans('main.user.atmn.certified') !!} <!-- <span class="astrict">*</span> --></label>
                        <input disabled="disabled" type="date" name="atmn_certified" class="form-control" id="atmn_certified" placeholder="{!! trans('main.user.atmn.certified') !!}" value="{{ $data->atmn_certified ?? '' }}" >
                        @if ($errors->has('atmn_certified'))
                           <span class="help-block">
                              {{ $errors->first('atmn_certified') }}
                           </span>
                        @endif
                      </div>
                      <div class="col form-group col-md-3.5">
                        <label class="label-name">{!! trans('main.user.affiliation') !!}</label>
                        <select name="affiliation" class="form-select" value="{{ $data->affiliation ?? '' }}">
                          <option>Not Selected</option>
                          <option>IPM Employee</option>
                          <option>VCM Associate</option>
                          <option>Other</option>
                        </select>
                        @if ($errors->has('affiliation'))
                           <span class="help-block">
                              {{ $errors->first('affiliation') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.ministry.area') !!}</label>
                        <select name="ministry_area"class="form-select" value="{{ $data->ministry_area ?? '' }}">
                          <option>Not Selected</option>
                          <option>Within 100 Miles</option>
                          <option>Within 500 Miles</option>
                          <option>Nationally</option>
                          <option>Internationally</option>
                        </select>
                        @if ($errors->has('ministry_area'))
                           <span class="help-block">
                              {{ $errors->first('ministry_area') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.district.issuing') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="district_issuing" id="district_issuing" placeholder="{!! trans('main.user.district.issuing') !!}" value="{{ $data->district_issuing ?? '' }}">
                        @if ($errors->has('district_issuing'))
                           <span class="help-block">
                              {{ $errors->first('district_issuing') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.field1') !!} <span class="astrict">*</span>
                          <span class="choose-file-note">(Note:You can only upload pdf and doc files)</span>
                        </label>
                        <!-- <input disabled="disabled" type="file" name="file" class="custom-file-input" id="chooseFile" > -->
                        <span class="form-control choose-file">
                          <input disabled="disabled" type="file" id="actual-btn" accept=".pdf,.doc,.docx" hidden/>
                          <!-- our custom upload button -->
                          <label for="actual-btn" class="actual-label" >Choose File</label>
                          <!-- name of file chosen -->
                          <span id="file-chosen">No file chosen</span>
                        </span>
                        <div class="">
                          
                        </div>
                        @if ($errors->has(''))
                           <span class="help-block">
                              {{ $errors->first('') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.email') !!}</label>
                        <input disabled="disabled" type="email" class="form-control" name="email" id="email" placeholder="{!! trans('main.user.email') !!}" value="{{ $data->email ?? '' }}">
                        @if ($errors->has('email'))
                           <span class="help-block">
                              {{ $errors->first('email') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.license') !!}</label>
                        <input disabled="disabled" type="text" class="form-control" name="license" id="license" placeholder="{!! trans('main.user.license') !!}" value="{{ $data->license ?? '' }}">
                        @if ($errors->has('license'))
                           <span class="help-block">
                              {{ $errors->first('license') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <input disabled="disabled" type="checkbox" name="send_mail" id="send_mail" placeholder="{!! trans('main.user.send.mail') !!}" value="{{ $data->send_mail ?? '' }}Y">
                        <label class="label-name">{!! trans('main.user.send.mail') !!}</label>
                        @if ($errors->has('send_mail'))
                           <span class="help-block">
                              {{ $errors->first('send_mail') }}
                           </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-7">
                        <label class="label-name">{!! trans('main.user.home.address') !!}</label>
                        <!-- <input disabled="disabled" type="text" class="form-control" name="home_address" id="home_address" placeholder="{!! trans('main.user.home.address') !!}" > -->
                       <textarea class="form-control" name="home_address" rows="3" placeholder="{!! trans('main.user.home.address') !!}" value="{{ $data->home_address ?? '' }}"></textarea>
                        @if ($errors->has('home_address'))
                           <span class="help-block">
                              {{ $errors->first('home_address') }}
                           </span>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label class="label-name">{!! trans('main.user.comments') !!}</label>
                        <textarea class="form-control" name="comments" rows="3" placeholder="{!! trans('main.user.comments') !!}" >{{ $data->comments ?? '' }}</textarea>
                        @if ($errors->has('comments'))
                           <span class="help-block">
                              {{ $errors->first('comments') }}
                           </span>
                        @endif  
                      </div>
                    </div>
                  </div>
                </div>
                <input  type="hidden" name="user_id" value="{{$data->user_id}}">
                <input  type="hidden" name="ds_id" value="{{$user->id}}">

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit">{{ @$data->id ? trans('main.user.profile.edit') : trans('main.submit') }}</button></div>
               
              </form>
      </div>
      </div>
      <!-- Application form conditions -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      // Phone Number mask jquery
        const obj =  {
                "home_phone": home_phone,
                "cell_phone": cell_phone,
                "office_phone": office_phone
              }
        $.each(obj, function(value) {
            document.getElementById(value).addEventListener('input', function (e) {
              var x = e.target.value.replace(/\D/g, '').match(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
              e.target.value = '(' +x[1] + ') '+ x[2] + '-' + x[3]
            });
        });

      // Choose File to the input
        const actualBtn = document.getElementById('actual-btn');
        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
          fileChosen.textContent = this.files[0].name
        });

  </script>

@endsection