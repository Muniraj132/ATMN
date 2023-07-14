@extends('admin.layouts.subpage')
@section('title','Financial Stewardship')
@section('content')
<section id="container" >
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <h1 class="panel-heading admin-sub-text">
                    Questions for Financial Stewardship
                </h1>
                <div class="panel-body">
                <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr class="title-text">
                    <th>Survey</th>
                    <th>Comments</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(@$data)
                	@foreach($data as $value)
                	<tr class="gradeX" id="<?php echo $value->id; ?>">
                        <td>{!! \Helpers::getUserName(@$value->survey_id) !!}</td>

                        <td>{!! $value->wg_comments !!}</td>                      

                        <td>{{ Carbon\Carbon::parse(@$value->created_at)->format('d F Y') }}</td>

						<td>
                        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><button class="btn btn-icon waves-effect waves-light btn-warning m-b-5"><i class="fa fa-eye"></i> </button> </a>
                        <a href="{{route('financial-stewardship.destroy',array($value->id))}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash-o"></i></a>
                        </td>
                	</tr>	
                    @endforeach
                @endif
                </tbody>
                </table>
                </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div class="modal fade" id="financial_model" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Questions for Financial Stewardship</h4>
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Please answer these questions regarding your perceptions of church stewardship.') !!}</strong></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you trust that the
church finances are used prayerfully according to the will of God?') !!}</strong></div>
              <div class="col-md-8"><span class="q1"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you practice faithful
tithing?') !!}</strong></div>
              <div class="col-md-8"><span class="q2"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe the
church is generous in meeting the needs of congregants in need?') !!}</strong></div>
              <div class="col-md-8"><span class="q3"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Are you motivated to
give to the mission of the church?') !!}</strong></div>
              <div class="col-md-8"><span class="q4"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you see that the
church carries out the mission of the church within its means?') !!}</strong></div>
              <div class="col-md-8"><span class="q5"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe that the
church practices financial accountability?') !!}</strong></div>
              <div class="col-md-8"><span class="q6"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you see that your
church\'s facilities are taken care of?') !!}</strong></div>
              <div class="col-md-8"><span class="q7"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Comments on Financial Stewarship') !!}</strong></div>
              <div class="col-md-8"><span class="fs_comments"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Created On') !!}</strong></div>
              <div class="col-md-8"><span class="created_at"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
//View details in popup
function viewPopup(id){
    var id    = id;
    var token = '<?php echo csrf_token(); ?>';
    var setUrl = "{{ URL::to('show-financial-stewardship') }}/"+id;
    $.ajax({
        url: setUrl,
        type: 'GET',
        async: true,
        cache:false,
        success: function(data){
            if(data){
                var getData = JSON.parse(data);
                var setData = getData['financial'];
                var setDatePosted  = moment(setData.created_at).format('D-MMMM-YY');
                if(setData.q1 == null || setData.q1 == ''){
                  $(".q1").text("-");
                } else {
                  $(".q1").text(setData.q1);
                  if(setData.q1 == 1) {
                        $(".q1").text("Not at all");
                  } else if(setData.q1 == 2) {
                        $(".q1").text("Very little");
                  } else if(setData.q1 == 3) {
                        $(".q1").text("Some");
                  } else if(setData.q1 == 4) {
                        $(".q1").text("Much");
                  } else if(setData.q1 == 5) {
                        (".q1").text("A Great Deal");
                  } else {
                        $(".q1").text("-");
                  }
                }
                if(setData.q2 == null || setData.q2 == ''){
                  $(".q2").text("-");
                } else {
                  if(setData.q2 == 1) {
                        $(".q2").text("Not at all");
                  }else if(setData.q2 == 2){
                        $(".q2").text("Very little");
                  }else if(setData.q2 == 3){
                        $(".q2").text("Some");
                  }else if(setData.q2 == 4){
                        $(".q2").text("Much");
                  }else if(setData.q2 == 5){
                        $(".q2").text("A Great Deal");
                  }else {
                        $(".q2").text("-");
                  }
                }
                if(setData.q3 == null || setData.q3 == ''){
                  $(".q3").text("-");
                } else {
                 if(setData.q3 == 1) {
                        $(".q3").text("Not at all");
                  }else if(setData.q3 == 2){
                        $(".q3").text("Very little");
                  }else if(setData.q3 == 3){
                        $(".q3").text("Some");
                  }else if(setData.q3 == 4){
                        $(".q3").text("Much");
                  }else if(setData.q3 == 5){
                        $(".q3").text("A Great Deal");
                  }else {
                        $(".q3").text("-");
                  }
                }
                if(setData.q4 == null || setData.q4 == ''){
                  $(".q4").text("-");
                } else {
                  if(setData.q4 == 1) {
                        $(".q4").text("Not at all");
                  }else if(setData.q4 == 2){
                        $(".q4").text("Very little");
                  }else if(setData.q4 == 3){
                        $(".q4").text("Some");
                  }else if(setData.q4 == 4){
                        $(".q4").text("Much");
                  }else if(setData.q4 == 5){
                        $(".q4").text("A Great Deal");
                  }else {
                        $(".q4").text("-");
                  }
                }

                if(setData.q5 == null || setData.q5 == ''){
                  $(".q5").text("-");
                } else {
                  if(setData.q5 == 1) {
                        $(".q5").text("Not at all");
                  }else if(setData.q5 == 2){
                        $(".q5").text("Very little");
                  }else if(setData.q5 == 3){
                        $(".q5").text("Some");
                  }else if(setData.q5 == 4){
                        $(".q5").text("Much");
                  }else if(setData.q5 == 5){
                        $(".q5").text("A Great Deal");
                  }else {
                        $(".q5").text("-");
                  }
                }

                if(setData.q6 == null || setData.q6 == ''){
                  $(".q6").text("-");
                } else {
                  if(setData.q6 == 1) {
                        $(".q6").text("Not at all");
                  }else if(setData.q6 == 2){
                        $(".q6").text("Very little");
                  }else if(setData.q6 == 3){
                        $(".q6").text("Some");
                  }else if(setData.q6 == 4){
                        $(".q6").text("Much");
                  }else if(setData.q6 == 5){
                        $(".q6").text("A Great Deal");
                  }else {
                        $(".q6").text("-");
                  }
                }

                if(setData.q7 == null || setData.q7 == ''){
                  $(".q7").text("-");
                } else {
                  if(setData.q7 == 1) {
                        $(".q7").text("Not at all");
                  }else if(setData.q7 == 2){
                        $(".q7").text("Very little");
                  }else if(setData.q7 == 3){
                        $(".q7").text("Some");
                  }else if(setData.q7 == 4){
                        $(".q7").text("Much");
                  }else if(setData.q7 == 5){
                        $(".q7").text("A Great Deal");
                  }else {
                        $(".q7").text("-");
                  }
                }

                if(setData.fs_comments == null || setData.fs_comments == ''){
                  $(".fs_comments").text("-");
                } else {
                  $(".fs_comments").text(setData.fs_comments);
                }
                $(".created_at").text(setDatePosted);
            } else {
                $(".q1").text("");
                $(".q2").text("");
                $(".q3").text("");
                $(".q4").text("");
                $(".q5").text("");
                $(".q6").text("");
                $(".q7").text("");
                $(".fs_comments").text("");
                $(".created_at").text("");
            }
        }
    });
    $("#financial_model").modal('show');

};
</script>

@endsection