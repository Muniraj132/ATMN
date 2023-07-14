@extends('admin.layouts.subpage')
@section('title','Intake Form')
@section('content')
  <div class="">
    <!-- Page-Title -->
        <div class="col-sm-11">
            <h1 class="panel-heading admin-sub-text">
                    Intake Form
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
                                {!! Form::label('first_name', trans('main.intake.first_name'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->first_name ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_name', trans('main.intake.church_name'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->church_name ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                           <div class="form-group">
                            
                                {!! Form::label('email', trans('main.intake.email'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               
                              
                                {!! @$intakeform->email ?: '-' !!}
                               </div> 
                            
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('phone', trans('main.intake.phone'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->phone ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('pri_reason', trans('main.intake.pri_reason'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->pri_reason ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('peak_believe', trans('main.intake.peak_believe'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->peak_believe ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('peak_opened', trans('main.intake.peak_opened'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->peak_opened ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('peak_closed', trans('main.intake.peak_closed'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->peak_closed ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('peak_delivered', trans('main.intake.peak_delivered'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->peak_delivered ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('peak_adults', trans('main.intake.peak_adults'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->peak_adults ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('', trans('main.intake.attendance'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('', trans('main.intake.content1'),array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('avg_three_yrs', trans('main.intake.avg_three_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->avg_three_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('avg_two_yrs', trans('main.intake.avg_two_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->avg_two_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('avg_one_yrs', trans('main.intake.avg_one_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->avg_one_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('avg_ytd', trans('main.intake.avg_ytd'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->avg_ytd ?: '-' !!}
                            </div>

                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                
                                {!! Form::label('', trans('main.intake.attenders'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('', trans('main.intake.content2'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('new_three_yrs', trans('main.intake.new_three_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->new_three_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('new_two_yrs', trans('main.intake.new_two_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->new_two_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('new_one_yrs', trans('main.intake.new_one_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->new_one_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('new_ytd', trans('main.intake.new_ytd'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->new_ytd ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('disciple_making', trans('main.intake.disciple_making'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->disciple_making ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_name', trans('main.intake.discipleship'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('disciple_three_yrs', trans('main.intake.disciple_three_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->disciple_three_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('disciple_two_yrs', trans('main.intake.disciple_two_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->disciple_two_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('disciple_one_yrs', trans('main.intake.disciple_one_yrs'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->disciple_one_yrs ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('disciple_ytd', trans('main.intake.disciple_ytd'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->disciple_ytd ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('serving_leader', trans('main.intake.serving_leader'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->serving_leader ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('added_leader', trans('main.intake.added_leader'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->added_leader ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('outreaches_community', trans('main.intake.outreaches_community'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->outreaches_community ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('outreaches_region', trans('main.intake.outreaches_region'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->outreaches_region ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('outreaches_world', trans('main.intake.outreaches_world'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->outreaches_world ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('vision_mission', trans('main.intake.vision_mission'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->vision_mission ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_plan', trans('main.intake.church_plan'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->church_plan ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_name', trans('main.intake.evaluate'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q1', trans('main.intake.q1'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$intakeform->q1 == 1) 
                                    Yes
                               @elseif(@$intakeform->q1 == 2)
                                    No
                               @elseif(@$intakeform->q1 == 3)
                                    In Development
                               @else
                                    -
                               @endif    
                                
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q2', trans('main.intake.q2'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$intakeform->q2 == 1) 
                                    Yes
                               @elseif(@$intakeform->q2 == 2)
                                    No
                               @elseif(@$intakeform->q2 == 3)
                                    In Development
                               @else
                                    -
                               @endif  
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q3', trans('main.intake.q3'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$intakeform->q3 == 1) 
                                    Yes
                               @elseif(@$intakeform->q3 == 2)
                                    No
                               @elseif(@$intakeform->q3 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q4', trans('main.intake.q4'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                @if(@$intakeform->q4 == 1) 
                                    Yes
                               @elseif(@$intakeform->q4 == 2)
                                    No
                               @elseif(@$intakeform->q4 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q5', trans('main.intake.q5'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                               @if(@$intakeform->q5 == 1) 
                                    Yes
                               @elseif(@$intakeform->q5 == 2)
                                    No
                               @elseif(@$intakeform->q5 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q6', trans('main.intake.q6'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                @if(@$intakeform->q6 == 1) 
                                    Yes
                               @elseif(@$intakeform->q6 == 2)
                                    No
                               @elseif(@$intakeform->q6 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q7', trans('main.intake.q7'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                @if(@$intakeform->q7 == 1) 
                                    Yes
                               @elseif(@$intakeform->q7 == 2)
                                    No
                               @elseif(@$intakeform->q7 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('q8', trans('main.intake.q8'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                @if(@$intakeform->q8 == 1) 
                                    Yes
                               @elseif(@$intakeform->q8 == 2)
                                    No
                               @elseif(@$intakeform->q8 == 3)
                                    In Development
                               @else
                                    -
                               @endif 
                            </div>
                             <div class="clearfix">&nbsp;</div>
                              <div class="clearfix">&nbsp;</div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_weakness', trans('main.intake.church_weakness'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->church_weakness ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('church_strength', trans('main.intake.church_strength'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->church_strength ?: '-' !!}
                            </div>
                            <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('custom_questions', trans('main.intake.custom_questions'), array('class' => 'col-xs-4 col-sm-4 col-md-2 col-lg-3 control-label')) !!}
                                {!! @$intakeform->custom_questions ?: '-' !!}
                            </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="clearfix">&nbsp;</div>
                             <a href="{!! route('intake-form.index') !!}"><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">Back </button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
</div>
@stop
