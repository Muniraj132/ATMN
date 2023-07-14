<!-- Example With Icon -->

<div class="row row-lg" style="margin : 0px;">
<div class="col-md-12 col-lg-12">
  <div>
   
   @if ( Session::has('alert') )
    <div class="alert dark alert-primary alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="icon wb-bell" aria-hidden="true"></i> {!! Session::get('alert') !!}
    </div>
    @endif

    @if ( Session::has('info') )
    <div class="alert dark alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="icon wb-info" aria-hidden="true"></i> {!! Session::get('info') !!}
    </div>
    @endif

    @if ( Session::has('success') )
    <div class="alert dark alert-success alert-dismissible" role="alert">
      <i class="ion-checkmark-round"></i> &nbsp; {!! Session::get('success') !!}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if ( Session::has('error') )
    <div class="alert dark alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="icon wb-close" aria-hidden="true"></i> {!! Session::get('error') !!}
    </div>
    @endif

    @if ( Session::has('warning') )
    <div class="alert dark alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="icon wb-alert" aria-hidden="true"></i> {!! Session::get('warning') !!}
    </div>
    @endif

   <!--  @if ( Session::has('errors') )
    <div class="alert dark alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <ul>
       @foreach ($errors->all() as $error)
        <li><strong>{{ $error }}<strong></li>
        @endforeach
      </ul>
    </div>
    @endif -->

    <!-- <div class="alert dark alert-danger alert-dismissible ajax_msg" role="alert" style="display: none">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <ul>
       @foreach ($errors->all() as $error)
        <li><strong>{{ $error }}<strong></li>
        @endforeach
      </ul>
    </div> -->


  </div>
</div>
</div>

<!-- End Example With Icon -->
