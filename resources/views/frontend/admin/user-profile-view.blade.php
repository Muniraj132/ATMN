@extends('frontend.layouts.main')
@section('content')
@php
use App\Helpers\ATMNHelper;
$home_address = $data->home_address ?? '';
$value=explode(",",$home_address);
    $street1  = $value[0] ?? '';
    $street2  = $value[1] ?? '';
    $city     = $value[2] ?? '';
    $stateval = $value[3] ?? '';
    $country  = $value[4] ?? 'US';
    $zip      = $value[5] ?? '';
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-9">
    <div class="php-email-form">
        <div class="row">
            <div class="col-md-12">
                <div class="row bar">
                    <label>User Profile Details</label>
                </div>
            </div>
        </div>
        <br>
        @if (session('password-reset-success'))
               <div class="alert alert-success" id="success">
                  {{ session('password-reset-success') }}
                    <div style="float:right;margin-top: -5px;">
                        <button type="button" id="Closesuccess" class="close">&times;</button>
                    </div>
               </div>
               <br>
        @endif
        @if (session('error'))
               <div class="alert alert-error" id="error">
                  {{ session('error') }}
                  <div style="float:right;margin-top: -5px;">
                        <button type="button" id="closesuccess" class="close">&times;</button>
                    </div>
               </div>
               <br>
        @endif
        <div class="row">
            <div class="col-md-4" align="center">
                <img src="{{asset('assets\img\alliance-logo.png')}}" width="150px" >
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3"><label>Username</label></div>
                    <div class="col-md-8"><label>{{ Auth::user()->username }}</label></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><label>Email</label></div>
                    <div class="col-md-8"><label>{{ Auth::user()->email }}</label></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><label>Address</label></div>
                    <div class="col-md-8">
                        @if($street1 != "")
                        <label>{{$street1}},{{$street2}},</label><br>
                        <label>{{$city}},{{$stateval}},<br></label><br>
                        <label>{{$country}},{{$zip}}.<br></label>
                        @endif
                    </div>
                </div>
                <br> 
            </div>
        </div>
        <br>
        <!-- <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <label>
                            <a href="#" id="profile_edit" data-id="{{ Auth::user()->id }}">Profile Edit</a>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <label>
                            <a href="{{ route('user.change-password',array(ATMNHelper::encryptUrl(Auth::user()->id))) }}">Change Password</a>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3"><label><a href="{{ route('password.request') }}">Forgot Password</a></label></div>
        </div> -->
    </div>
</div>
<div class="container">
      <!-- Modal -->
      <div class="modal" id="myModal" >
      <div class="modal-dialog modal-md modal-centered">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="background-color:#801214;color: #fff;">
            <h4>Profile Details Update</h4>
            <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <form id="myProfileForm">                                                      
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-12">
                <label class="label-name">{!! trans('main.user.name') !!}</label>
                <input type="text" name="name" class="form-control" id="name"  value="" >
                @if ($errors->has('start_date'))
                   <span class="help-block">
                      {{ $errors->first('start_date') }}
                   </span>
                @endif
              </div>
            </div>
          </div>
          <input type="hidden" id="userdata_id" name="id" value="">
          <div class="modal-footer">
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="profileUpdateBtn" >{!! trans('main.update') !!}</button>
            <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModal" type="button" >{!! trans('main.close') !!}</button>
          </div>
        </form>
      </div>

      </div>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript">
    
    $("#Closesuccess").click(function() {
        $('#success').attr('style','display:none');
    });
     
    $("#closesuccess").click(function() {
        $('#error').attr('style','display:none');
    });

    $("#profile_edit").click(function() {
      var id = $(this).attr('data-id');
      $('#userdata_id').val(id);
      $('#myModal').appendTo("body").modal('toggle');
      $('#myProfileForm').trigger("reset");
    });

    $("#closeModal").click(function() {
      $('#myModal').modal('hide');
      $('#myProfileForm').trigger("reset");
    });

    $("#CloseModal").click(function() {
      $('#myModal').modal('hide');
      $('#myProfileForm').trigger("reset");
    });

    $("#profileUpdateBtn").click(function() {
        var id = $('#userdata_id').val();
        var name = $('#name').val();
    });

    $('#profileUpdateBtn').on('click',function(e) {
      e.preventDefault();
        var id = $("#id").val();
        var name = $('#name').val();
        var token = $("meta[name='csrf-token']").attr("content");
        var data = {
          'id' : id,
          'name' : name,
          "_token": token,
          };
        $.ajax({
        method : "post",
        url: "",
        data : data,
          success: function(response) {
            console.log(response.unavailabeData);
            $('#myProfileForm').modal('hide');
            swal("Success!", "Your Profile Details Updated Successfully!", "success");
            availability_table.draw();
          }
       });
    });

</script>
@endsection