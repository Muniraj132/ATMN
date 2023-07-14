@extends('frontend.layouts.main')
@section('title', trans('main.feedback.title'))
@section('header')
@php    
    $page = 'Feedback'; 
    //$page2 = 'Form'; 
    $br_link = ''; 
@endphp
@section('content')
<div class="container b-forgot-password-page">
        <div class="clearfix"></div>
        <div class="row">
        <section class="container b-welcome-box">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h2 class="is-global-title f-center f-legacy-h1">We’d love to hear from you!</h2>
                    <p class="f-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a scelerisque turpis, ut porta turpis. Integer imperdiet aliquet velit, vel tincidunt lectus dictum sed. Curabitur dignissim ut massa vel tincidunt. Nullam imperdiet pharetra ipsum in lobortis. Etiam convallis, felis quis dapibus dictum, libero mauris luctus nunc, non fringilla purus ligula non justo. Nullam </p>
                </div>
            </div>
        </section>
        {!! Form::open( array('route' => 'save_feedback','id' => 'feedbackForm','class'=>'form-horizontal')) !!}
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-left: 0;">
                <div class="b-forgot-password-form">
                    <div class="b-form-row b-form-inline b-form-horizontal b-form-password">
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-user"></i>
                                <?php if($feedback) { ?>
                                @foreach($feedback as $index=>$value)
                                {!! Form::text('name', @$value->name, array('class'=>'form-control', 'id' => 'display_name', 'placeholder' => 'Display Name')) !!}
                                @endforeach
                                <?php } else { ?>
                                 {!! Form::text('name', @$feedback->name, array('class'=>'form-control', 'id' => 'display_name', 'placeholder' => 'Display Name')) !!}
                                 <?php } ?>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-envelope"></i>
                                <?php if($feedback) { ?>
                                @foreach($feedback as $index=>$value)
                                {!! Form::text('email', @$value->email, array('class'=>'form-control', 'id' => 'email', 'placeholder' => 'Email')) !!}
                                @endforeach
                                <?php } else { ?>
                                 {!! Form::text('email', @$feedback->email, array('class'=>'form-control', 'id' => 'email', 'placeholder' => 'Email')) !!}
                                 <?php } ?>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="b-form-horizontal--mail f-form-horizontal--mail front-fedback-dropbox">
                            <i class="fa fa-arrows"></i>
                            <select class="form-control" name="feedback_type" id ="feedback_type">
                                <option value="">Choose a Feedback</option>
                                <option value="Site Feedback">Site Feedback</option>
                                <option value="Good Portal">Good Portal</option>
                                <option value="Bad Portal">Bad Portal</option>
                                <option value="Enquiry">Enquiry</option>
                                <option value="Question">Question</option>
                            </select>
                            <label id="feedback_type-error" class="error" for="feedback_type"></label>
                            @if ($errors->has('feedback_type'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('feedback_type') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="b-form-row">
                     
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-bank bank-icon"></i>
                                <textarea class="form-control msg-box share-form" rows="4" name="feedback" id="feedback" maxlength="1000" placeholder="(1000 Characters Remaining)"></textarea>
								   <div class="charact-remain"> <span id="chars">1000</span> Characters Remaining</div>
                                @if ($errors->has('feedback'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('feedback') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div>
                                {!! Form::submit('Submit Feedback',['class' => 'button-sm button-blue']) !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
<style type="text/css">
    .error {
        color: red;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        //Select 2
        $("#feedback_type").select2();
        //Textarea count
        var maxLength = 1000;
        $('textarea').keyup(function() {
            var length = $(this).val().length;
            var length = maxLength-length;
            var setCharcter = $(this).attr('id');
            if(setCharcter == "feedback"){
                $('#chars').text(length);
            }
        });

        // Validate form fields
        $("#feedbackForm").validate({
          ignore: [],
          rules: {
            name: "required",
            email: "required",
            feedback: "required",
            feedback_type: "required"
            },
          messages: {
            name: "Name is required",
            email: "Email is required",
            feedback: "Feedback is required",
            feedback_type: "Feedback type is required"
          }
        });
    });
</script>
@stop