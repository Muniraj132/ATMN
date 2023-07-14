@extends('frontend.layouts.main')
@section('title', trans('main.menu.share_file'))
@section('header')
@php    
    $page = 'Share File'; 
@endphp
@section('content')
<div class="l-main-container">
    <div class="container b-forgot-password-page">
        <div class="row">
        {!! Form::open( array('route' => 'save_file','id' => 'sharefileForm','files'=>'true','class'=>'form-horizontal')) !!}
            <div class="b-shortcode-example">
        <blockquote class="b-blockquote--secondary f-blockquote--secondary f-primary-b">You can send Article, Blog, Picture and Other College related material to us for Archives.  We will get back to you after we review the details.
        </blockquote>
      </div>
            <div class="col-md-5 col-md-offset-5 col-sm-6 col-sm-offset-4" style="margin-left: 0;">                
                <div class="b-forgot-password-form">
                    <div class="b-form-row b-form-inline b-form-horizontal b-form-password">
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-user"></i>
                                <?php if($file) { ?>
                                @foreach($file as $index=>$value)
                                {!! Form::text('display_name', @$value->name, array('class'=>'form-control', 'id' => 'display_name', 'placeholder' => 'Display Name','readonly')) !!}
                                {{ Form::hidden('user_id', @$value->id, array('id' => 'user_id')) }}
                                @endforeach
                                <?php } else { ?>
                                 {!! Form::text('display_name', @$file->name, array('class'=>'form-control', 'id' => 'display_name', 'placeholder' => 'Display Name','readonly')) !!}
                                 <?php } ?>
                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-envelope"></i>
                                <?php if($file) { ?>
                                @foreach($file as $index=>$value)
                                {!! Form::text('email', @$value->email, array('class'=>'form-control', 'id' => 'email', 'placeholder' => 'Email','readonly')) !!}
                                @endforeach
                                <?php } else { ?>
                                 {!! Form::text('email', @$file->email, array('class'=>'form-control', 'id' => 'email', 'placeholder' => 'Email','readonly')) !!}
                                 <?php } ?>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="error">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-upload"></i>
                                {{Form::file('link_file_download', array('class'=>'form-control', 'id'=>'link_file_download','accept' => trans('main.share_file_extension')))}}
                                <div>
                               </div>
                                <p><b>Allowed File Formats:</b> DOC, DOCX, PDF <br/>
                                    <b>Max File Size:</b> 2MB
                                </p>
                            </div>
                        </div>
                        </div>
                        <div class="b-form-row">
                        
                            <div class="b-form-horizontal--mail f-form-horizontal--mail">
                                <i class="fa fa-bank bank-icon"></i>
                                <textarea class="form-control msg-box share-form" rows="4" name="description" id="description" maxlength="1000" placeholder="(1000 Characters Remaining)"></textarea>
                                <div class="pull-right" style="margin-top:10px;width:100%;"> <span id="chars">1000</span> Characters Remaining</div>
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div class="b-form-horizontal--mail f-form-horizontal--mail user_lab_txt">
                                <input type="checkbox" name="checkbox" id="checkbox" class="user_check_box">{!! trans('main.terms') !!}
                                <label id="checkbox-error" class="error" for="checkbox"></label>
                            </div>
                        </div>
                        <div class="b-form-row">
                            <div class="user_share_btn">
                            {!! Form::submit('Submit File',['class' => 'button-xs button-turquoise']) !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
</div>
<style type="text/css">
    .error {
        color: red;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        //Textarea count
        var maxLength = 1000;
        $('textarea').keyup(function() {
            var length = $(this).val().length;
            var length = maxLength-length;
            var setCharcter = $(this).attr('id');
            if(setCharcter == "description"){
                $('#chars').text(length);
            }
        });

        // Validate form fields
        $("#sharefileForm").validate({
          ignore: [],
          rules: {
            link_file_download: "required",
            checkbox: "required",
            description: "required"
            },
          messages: {
            link_file_download: "File is required",
            checkbox: "Terms of Service is required",
            description: "Description is required"
          }
        });

        $("#link_file_download").change(function () {
                var fileExtension = ['doc', 'docx', 'pdf'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    //swal("Only formats are allowed : " + fileExtension.join(', '));
                    swal("Only formats are allowed :"+ fileExtension.join(', '), {
                                            icon: "error",
                                            });
                    $('#link_file_download').val(null);
                    //e.preventDefault();
                }
            });
    });
</script>
@stop