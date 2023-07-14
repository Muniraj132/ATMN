@extends('admin.layouts.subpage')
@section('title','Attending The Church')
@section('content')
  <div class="">
    <!-- Page-Title -->
        <div class="col-sm-11">
            <h1 class="panel-heading admin-sub-text">
                    Attending The Church
                </h1>
        </div>
    <!-- Page-Title -->
    <div class="">
        <div class="col-lg-11">
            <div class="panel panel-color panel-purple">
                
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('attend_church_involve', trans('Before you left the church choose the one that best describes your involvement at the church'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->attend_church_involve ?: '-' !!}
                            </div>

                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('primary_reason', trans('What would you say was your primary reason for leaving the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->primary_reason ?: '-' !!}
                              </div> 
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                              <div class="form-group">
                                {!! Form::label('other_reason', trans('Other (please specify)'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->other_reason ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('experience', trans('What would say was the highlight of your experience at the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->experience ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('exp_other', trans('Other (please specify)'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->exp_other ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                              <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('leave_church', trans('How long ago did you leave the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->leave_church ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('current_church_involve', trans('How would you describe your involvement in your current church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->current_church_involve ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('other_church_involve', trans('Other (please specify)'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->other_church_involve ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                              <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="form-group">
                                {!! Form::label('help_church', trans('If you are willing, please share anything that you feel is important to help the church become better.'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$attendchurch->help_church ?: '-' !!}
                              </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <a href="{!! route('attend-church.index') !!}"><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">Back </button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
</div>
@stop
