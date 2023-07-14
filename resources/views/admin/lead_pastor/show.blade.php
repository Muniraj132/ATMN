@extends('admin.layouts.subpage')
@section('title','Lead Pastor Leadership')
@section('content')
  <div class="">
    <!-- Page-Title -->
        <div class="col-sm-11">
            <h1 class="panel-heading admin-sub-text">
                   Lead Pastor Leadership
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
                                {!! Form::label('q', trans('Please answer these questions regarding your perceptions as a member of the pastoral/ministerial staff'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q1', trans('Do you cultivate relationships with other district pastors?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$leadpastor->q1 == 1) 
                                   Not at all
                               @elseif(@$leadpastor->q1 == 2)
                                   Very little
                               @elseif(@$leadpastor->q1 == 3)
                                    Some
                              @elseif(@$leadpastor->q1 == 4)
                                    Much
                               @elseif(@$leadpastor->q1 == 5)
                                    A Great Deal
                               @else
                                    -
                               @endif    
                                
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q2', trans('Do you have relationships with other district pastors who hold you accountable?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q2 == 1) 
                                   Not at all
                               @elseif(@$leadpastor->q2 == 2)
                                   Very little
                               @elseif(@$leadpastor->q2 == 3)
                                    Some
                              @elseif(@$leadpastor->q2 == 4)
                                    Much
                               @elseif(@$leadpastor->q2 == 5)
                                    A Great Deal
                               @else
                                    -
                               @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q3', trans('Are you supported by your Elders/Governing Board?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q3 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q3 == 2)
                                   Very little
                            @elseif(@$leadpastor->q3 == 3)
                                    Some
                            @elseif(@$leadpastor->q3 == 4)
                                    Much
                            @elseif(@$leadpastor->q3 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q4', trans('Does your Elder/Governing Board hold you accountable to clear expectations?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q4 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q4 == 2)
                                   Very little
                            @elseif(@$leadpastor->q4 == 3)
                                    Some
                            @elseif(@$leadpastor->q4 == 4)
                                    Much
                            @elseif(@$leadpastor->q4 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q5', trans('Do you hold your staff/volunteers to clear expectations?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q5 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q5 == 2)
                                   Very little
                            @elseif(@$leadpastor->q5 == 3)
                                    Some
                            @elseif(@$leadpastor->q5 == 4)
                                    Much
                            @elseif(@$leadpastor->q5 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q6', trans('Do you empower your staff/volunteers to minister in their roles effectively?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q6 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q6 == 2)
                                   Very little
                            @elseif(@$leadpastor->q6 == 3)
                                    Some
                            @elseif(@$leadpastor->q6 == 4)
                                    Much
                            @elseif(@$leadpastor->q6 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q7', trans('Do you feel supported by the District Staff?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q7 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q7 == 2)
                                   Very little
                            @elseif(@$leadpastor->q7 == 3)
                                    Some
                            @elseif(@$leadpastor->q7 == 4)
                                    Much
                            @elseif(@$leadpastor->q7 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q8', trans('Are you adequately compensated by the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q8 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q8 == 2)
                                   Very little
                            @elseif(@$leadpastor->q8 == 3)
                                    Some
                            @elseif(@$leadpastor->q8 == 4)
                                    Much
                            @elseif(@$leadpastor->q8 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q9', trans('Are you satisfied with the benefits package that you receive from your employment at the church?'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            @if(@$leadpastor->q9 == 1) 
                                   Not at all
                            @elseif(@$leadpastor->q9 == 2)
                                   Very little
                            @elseif(@$leadpastor->q9 == 3)
                                    Some
                            @elseif(@$leadpastor->q9 == 4)
                                    Much
                            @elseif(@$leadpastor->q9 == 5)
                                    A Great Deal
                            @else
                                    -
                            @endif   
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            
                             <a href="{!! route('lead-pastor.index') !!}"><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">Back </button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
</div>
@stop
