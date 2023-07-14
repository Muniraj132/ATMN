@extends('admin.layouts.subpage')
@section('title',trans('main.user.changepassword'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.user.changepassword') !!}
    </h3>
@stop
@section('content')

<!--sidebar end-->
<section class="panel form-horizontal">
	<h1 class="panel-heading admin-sub-text"> {!! trans('main.user.changepassword') !!}</h1>
	<div class="panel-body">
		<div class="position-left">
		{!! Form::open( array('url' => array('updatePassword'),'method'=>'POST', 'class'=>'form-vartical', 'accept-charset'=>'utf-8')) !!}
            <div class="form-group">
	            <div class="col-sm-3 control-label">
	                {!! Form::label('newpassword',trans('main.user.newpassword'),array('class'=>'custom_required')) !!}
	            </div>
				<div class="col-lg-6">
					<input type="password" name="password" class="form-control" placeholder="{{ 	trans('main.user.placepassword') }}">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
	                </div>
		        </div>
				    <div class="form-group">
	                <div class="col-sm-3 control-label">
	                    {!! Form::label('password_confirmation',trans('main.user.password_confirmation'),array('class'=>'custom_required')) !!}
	                </div>
					<div class="col-lg-6">
	                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ 	trans('main.user.password_confirmation') }}">
	                    @if ($errors->has('password_confirmation'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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
