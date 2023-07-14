@extends('admin.layouts.subpage')
@section('title',trans('main.user.profile'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.user.profile') !!}
    </h3>
@stop
@section('page_style')
<style type="text/css">
	[data-tooltip] {
	      cursor: default;
	      font: normal 1em sans-serif;
	  }

	  [data-tooltip]:hover:after {
	      display: block;
	      content: attr(data-tooltip);
	      white-space: pre-wrap;
	      color: #f00;
	  }
</style>
@stop
@section('content')
<?php //print_r($user->id);exit; ?>
<!--sidebar end-->
<section class="panel form-horizontal">
	<h1 class="panel-heading"> {!! trans('main.user.profile') !!}</h1>
	<div class="panel-body">
		<div class="position-left">
		{!! Form::open( array('url' => array('updateProfile', $user->id),'method'=>'POST', 'class'=>'form-vartical', 'accept-charset'=>'utf-8', 'enctype' => 'multipart/form-data')) !!}
				<div class="form-group">
	                <div class="col-sm-3 control-label">
	                    {!! Form::label('name',trans('main.user.name'),array('class'=>'custom_required')) !!}
	                </div>
					<div class="col-lg-6">
	                    {!! Form::text('name', @$user->name, array('class'=>'form-control', 'placeholder' => 'Enter Name')) !!}
	                    @if ($errors->has('name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	                    @endif
	                </div>
		        </div>
		        <div class="form-group">
	                <div class="col-sm-3 control-label">
	                    {!! Form::label('email',trans('main.user.email'),array('class'=>'custom_required')) !!}
	                </div>
					<div class="col-lg-6">
	                    {!! Form::text('email', @$user->email, array('class'=>'form-control', 'placeholder' => 'Enter Email')) !!}
	                    @if ($errors->has('email'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                    @endif
	                </div>
		        </div>
		          <div class="form-group">
	                <div class="col-sm-3 control-label">
	                      {!! Form::label('profile_picture', trans('main.user.profile_picture')) !!}
	                </div>
					<div class="col-lg-6">
	                   {{ Form::file('profile_picture', array('class' => 'upload'))}}
	                    @if ($errors->has('profile_picture'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('profile_picture') }}</strong>
	                    </span>
	                    @endif
	                </div>
	                <div class="col-lg-6">
	                @if (@$user->profile_picture)
	                <span class="help-block">
                            <a href="#" >
                                <img src="{!! URL::to('/uploads/userProfile') !!}/{!! @$user->profile_picture !!}"  alt="{!! @$user->profile_picture !!}" width="120px" height="150px" title="{!! @$user->profile_picture !!}" />
                            </a>
                    </span>
					@endif
					</div>
		        </div>
		         
				<div class="form-group">
					<div class="col-lg-offset-3 col-lg-6">
							<button type="submit" class="btn btn-primary" title="{!! trans('main.save') !!}">{!! trans('main.save') !!}</button>
							<a href="{!! URL::to('/admin/dashboard'); !!}" class="btn btn-default" title="{!! trans('main.cancel') !!}">{!! trans('main.cancel') !!}</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@stop
