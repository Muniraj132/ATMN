@extends('admin.layouts.subpage')
@section('title','Effective Organization')
@section('content')
<section id="container" >
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <h1 class="panel-heading admin-sub-text">
                    Questions for Effective Organization
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

                        <td>{!! $value->eo_comments !!}</td>                      

                        <td>{{ Carbon\Carbon::parse(@$value->created_at)->format('d F Y') }}</td>

						<td>
                        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><button class="btn btn-icon waves-effect waves-light btn-warning m-b-5"><i class="fa fa-eye"></i> </button> </a>
                        <a href="{{route('effective-organization.destroy',array($value->id))}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash-o"></i></a>
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

<div class="modal fade" id="worship_model" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Questions for Effective Organization</h4>
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Please answer these questions regarding your perceptions of church organization.') !!}</strong></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you see your church
intentionally evaluating its ministry?') !!}</strong>
</div>
              <div class="col-md-8"><span class="q1"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Does the church
leadership look for new opportunities to improve ministry?') !!}</strong></div>
              <div class="col-md-8"><span class="q2"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe the
church leadership is open to change for improvement?') !!}</strong></div>
              <div class="col-md-8"><span class="q3"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you think the church
is adequately staffed?') !!}</strong></div>
              <div class="col-md-8"><span class="q4"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe the staff
is competent to carry out their roles effectively?') !!}</strong></div>
              <div class="col-md-8"><span class="q5"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you volunteer to
serve at church services or events?') !!}</strong></div>
              <div class="col-md-8"><span class="q6"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe people
are eager to volunteer for the church?') !!}</strong></div>
              <div class="col-md-8"><span class="q7"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you experience
effective decision making processes with church leadership?') !!}</strong></div>
              <div class="col-md-8"><span class="q8"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you believe the
church operates in an organized, effective manner?') !!}</strong></div>
              <div class="col-md-8"><span class="q9"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you receive clear
communication on church news,events,programs?') !!}</strong></div>
              <div class="col-md-8"><span class="q10"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Comments on Effective Organization') !!}</strong></div>
              <div class="col-md-8"><span class="eo_comments"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you have children ages 3-18 who participate in the children or youth ministries of the church?') !!}</strong></div>
              <div class="col-md-8"><span class="youth_ministries"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Please select the church ministry programs that your children participate in at church.
Select all that apply.') !!}</strong></div>
              <div class="col-md-8"><span class="church_ministry"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('From your perspective, describe the strengths of the church.') !!}</strong></div>
              <div class="col-md-8"><span class="eo_church_strength"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('From your perspective, explain the weaknesses of the church.') !!}</strong></div>
              <div class="col-md-8"><span class="eo_church_weakness"></span></div>
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
    var setUrl = "{{ URL::to('show-effective-organization') }}/"+id;
    $.ajax({
        url: setUrl,
        type: 'GET',
        async: true,
        cache:false,
        success: function(data){
            if(data){
                var getData = JSON.parse(data);
                var setData = getData['effective'];
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

                if(setData.q8 == null || setData.q8 == ''){
                  $(".q8").text("-");
                } else {
                  if(setData.q8 == 1) {
                        $(".q8").text("Not at all");
                  }else if(setData.q8 == 2){
                        $(".q8").text("Very little");
                  }else if(setData.q8 == 3){
                        $(".q8").text("Some");
                  }else if(setData.q8 == 4){
                        $(".q8").text("Much");
                  }else if(setData.q8 == 5){
                        $(".q8").text("A Great Deal");
                  }else {
                        $(".q8").text("-");
                  }
                }

                if(setData.q9 == null || setData.q9 == ''){
                  $(".q9").text("-");
                } else {
                  if(setData.q9 == 1) {
                        $(".q9").text("Not at all");
                  }else if(setData.q9 == 2){
                        $(".q9").text("Very little");
                  }else if(setData.q9 == 3){
                        $(".q9").text("Some");
                  }else if(setData.q9 == 4){
                        $(".q9").text("Much");
                  }else if(setData.q9 == 5){
                        $(".q9").text("A Great Deal");
                  }else {
                        $(".q9").text("-");
                  }
                }

                if(setData.q10 == null || setData.q10 == ''){
                  $(".q10").text("-");
                } else {
                  if(setData.q10 == 1) {
                        $(".q10").text("Not at all");
                  }else if(setData.q10 == 2){
                        $(".q10").text("Very little");
                  }else if(setData.q10 == 3){
                        $(".q10").text("Some");
                  }else if(setData.q10 == 4){
                        $(".q10").text("Much");
                  }else if(setData.q10 == 5){
                        $(".q10").text("A Great Deal");
                  }else {
                        $(".q10").text("-");
                  }
                }

                if(setData.eo_comments == null || setData.eo_comments == ''){
                  $(".eo_comments").text("-");
                } else {
                  $(".eo_comments").text(setData.eo_comments);
                }

                if(setData.youth_ministries == null || setData.youth_ministries == ''){
                  $(".youth_ministries").text("-");
                } else {
                  $(".youth_ministries").text(setData.youth_ministries);
                }

                if(setData.church_ministry == null || setData.church_ministry == ''){
                  $(".church_ministry").text("-");
                } else {
                  $(".church_ministry").text(setData.church_ministry);
                }

                if(setData.eo_church_strength == null || setData.eo_church_strength == ''){
                  $(".eo_church_strength").text("-");
                } else {
                  $(".eo_church_strength").text(setData.eo_church_strength);
                }

                if(setData.eo_church_weakness == null || setData.eo_church_weakness == ''){
                  $(".eo_church_weakness").text("-");
                } else {
                  $(".eo_church_weakness").text(setData.eo_church_weakness);
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
                $(".q8").text("");
                $(".q9").text("");
                $(".q10").text("");
                $(".eo_comments").text("");
                $(".youth_ministries").text("");
                $(".church_ministry").text("");
                $(".eo_church_strength").text("");
                $(".eo_church_weakness").text("");
                $(".created_at").text("");
            }
        }
    });
    $("#worship_model").modal('show');

};
</script>

@endsection