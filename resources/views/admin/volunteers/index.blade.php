@extends('admin.layouts.subpage')
@section('title','Questions for Volunteers')
@section('content')
<section id="container" >
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <h1 class="panel-heading admin-sub-text">
                    Questions for Volunteers
                </h1>
                <div class="panel-body">
                <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr class="title-text">
                    <th>Name</th>
                    <th>Country of Origin</th>
                    <th>Volunteer Comments</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(@$data)
                	@foreach($data as $value)
                	<tr class="gradeX" id="<?php echo $value->id; ?>">
                        <td>{!! \Helpers::getUserName(@$value->survey_id) !!}</td>
                        
                        <td>{!! \Helpers::getOriginName(@$value->survey_id) !!}</td>

                        <td>{!! $value->volunteer_comment !!}</td>                      

                        <td>{{ Carbon\Carbon::parse(@$value->created_at)->format('d F Y') }}</td>

						<td>
                        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><button class="btn btn-icon waves-effect waves-light btn-warning m-b-5"><i class="fa fa-eye"></i> </button> </a>

                        <a href="{{route('questions-volunteers.destroy',array($value->id))}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash-o"></i></a>
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
        <!-- page end-->
    <!--main content end-->
<!--right sidebar start-->

<!--right sidebar end-->

</section>
<div class="modal fade" id="volunteer_model" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Questions for Volunteers</h4>
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Please answer these questions regarding your experience as a volunteer in the church') !!}</strong></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you feel valued by the church leadership?') !!}</strong></div>
              <div class="col-md-8"><span class="q1"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Do you receive adequate communication regarding your volunteer responsibilities?') !!}</strong></div>
              <div class="col-md-8"><span class="q2"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Are you given training to perform your volunteer role?') !!}</strong></div>
              <div class="col-md-8"><span class="q3"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Are you discipled by church leadership to grow in your relationship with God?') !!}</strong></div>
              <div class="col-md-8"><span class="q4"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('What ministry or ministries do you currently serve in?') !!}</strong></div>
              <div class="col-md-8"><span class="ministry_serve"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Volunteer Comments') !!}</strong></div>
              <div class="col-md-8"><span class="volunteer_comment"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Created On') !!}</strong></div>
              <div class="col-md-8"><span class="created_at"></span></div>
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
        //View
        function viewPopup(id){
            var id    = id;
            var token = '<?php echo csrf_token(); ?>';
            var setUrl = "{{ URL::to('show_volunteers') }}/"+id;
            $.ajax({
                url: setUrl,
                type: 'GET',
                async: true,
                cache:false,
                success: function(data){
                    if(data){
                        var getData = JSON.parse(data);
                        var setData = getData['volunteers'];
                        var setDatePosted  = moment(setData.created_at).format('D-MMMM-YY');
                       if(setData.q1 == null || setData.q1 == ''){
                          $(".q1").text("-");
                        } else {
                          $(".q1").text(setData.q1);
                          if(setData.q1 == 1) {
                                 $(".q1").text("Not at all");
                          }else if(setData.q1 == 2){
                                 $(".q1").text("Very little");
                          }else if(setData.q1 == 3){
                                 $(".q1").text("Some");
                          }else if(setData.q1 == 4){
                                 $(".q1").text("Much");
                          }else if(setData.q1 == 5){
                                  $(".q1").text("A Great Deal");
                          }else {
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
                        if(setData.ministry_serve == null || setData.ministry_serve == ''){
                          $(".ministry_serve").text("-");
                        } else {
                          $(".ministry_serve").text(setData.ministry_serve);
                        }
                        if(setData.volunteer_comment == null || setData.volunteer_comment == ''){
                          $(".volunteer_comment").text("-");
                        } else {
                          $(".volunteer_comment").text(setData.volunteer_comment);
                        }
                       $(".created_at").text(setDatePosted);
                    } else {
                        $(".q1").text("");
                        $(".q2").text("");
                        $(".q3").text("");
                        $(".q4").text("");
                        $(".ministry_serve").text("");
                        $(".volunteer_comment").text("");
                        $(".created_at").text("");
                       
                    }
                }
            });
            $("#volunteer_model").modal('show');

        };
</script>
@endsection