@extends('admin.layouts.subpage')
@section('title','Pastoral Staff Leadership')
@section('content')
  <div class="">
    <!-- Page-Title -->
        <div class="col-sm-11">
            <h1 class="panel-heading admin-sub-text">
                   Pastoral Staff pastoral
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
                                {!! Form::label('q', trans('Please answer these questions regarding your perceptions as a member of the pastoral/ministerial'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q1', trans('Do you cultivate relationships with other district workers?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$pastoral->q1 == 1) 
                                   Not at all
                               @elseif(@$pastoral->q1 == 2)
                                   Very little
                               @elseif(@$pastoral->q1 == 3)
                                    Some
                              @elseif(@$pastoral->q1 == 4)
                                    Much
                               @elseif(@$pastoral->q1 == 5)
                                    A Great Deal
                               @else
                                    -
                               @endif    
                                
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q2', trans('Do you have relationships with other district workers who hold you accountable?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q2 == 1) 
                                   Not at all
                               @elseif(@$pastoral->q2 == 2)
                                   Very little
                               @elseif(@$pastoral->q2 == 3)
                                    Some
                              @elseif(@$pastoral->q2 == 4)
                                    Much
                               @elseif(@$pastoral->q2 == 5)
                                    A Great Deal
                               @else
                                    -
                               @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q3', trans('Do you receive consistent verbal support from your ministry supervisor?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q3 == 1) 
                                   Not at all
                            @elseif(@$pastoral->q3 == 2)
                                   Very little
                            @elseif(@$pastoral->q3 == 3)
                                    Some
                            @elseif(@$pastoral->q3 == 4)
                                    Much
                            @elseif(@$pastoral->q3 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q4', trans('Does your ministry supervisor hold you accountable to clear expectations?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q4 == 1) 
                                   Not at all
                            @elseif(@$pastoral->q4 == 2)
                                   Very little
                            @elseif(@$pastoral->q4 == 3)
                                    Some
                            @elseif(@$pastoral->q4 == 4)
                                    Much
                            @elseif(@$pastoral->q4 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q5', trans('Are you supported in your ministry role by the Elders/Governing Board?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q5 == 1) 
                                   Not at all
                            @elseif(@$pastoral->q5 == 2)
                                   Very little
                            @elseif(@$pastoral->q5 == 3)
                                    Some
                            @elseif(@$pastoral->q5 == 4)
                                    Much
                            @elseif(@$pastoral->q5 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q6', trans('Are you adequately compensated by the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q6 == 1) 
                                   Not at all
                            @elseif(@$pastoral->q6 == 2)
                                   Very little
                            @elseif(@$pastoral->q6 == 3)
                                    Some
                            @elseif(@$pastoral->q6 == 4)
                                    Much
                            @elseif(@$pastoral->q6 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q7', trans('Are you satisfied with the benefits package that you receive from your employment at the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$pastoral->q7 == 1) 
                                   Not at all
                            @elseif(@$pastoral->q7 == 2)
                                   Very little
                            @elseif(@$pastoral->q7 == 3)
                                    Some
                            @elseif(@$pastoral->q7 == 4)
                                    Much
                            @elseif(@$pastoral->q7 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            
                             <a href="{!! route('pastoral-leadership.index') !!}"><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">Back </button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
</div>
@stop
