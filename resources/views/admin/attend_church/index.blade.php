@extends('admin.layouts.subpage')
@section('title','Attending The Church')
@section('content')
<section id="container" >
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <h1 class="panel-heading admin-sub-text">
                   Attending The Church
                </h1>
                <div class="panel-body">
                <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr class="title-text">
                    <th>Name</th>
                    <th>Country of Origin</th>
                    <th>Attending Church Involvement</th>
                    <th>Current Church Involvement</th>
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

                        <td>{{ $value->attend_church_involve }}</td>

                        <td>{{ $value->current_church_involve }}</td>
                        
                        <td>{{ Carbon\Carbon::parse(@$value->created_at)->format('d F Y') }}</td>

						<td> 
                         <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><button class="btn btn-icon waves-effect waves-light btn-warning m-b-5"><i class="fa fa-eye"></i> </button> </a>
                        <a href="{{route('attend-church.destroy',array($value->id))}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash-o"></i></a>
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
<div class="modal fade" id="attending_church" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attending The Church</h4>
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Before you left the church choose the one that best describes your involvement at the church') !!}</strong></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('What would you say was your primary reason for leaving the church?') !!}</strong></div>
              <div class="col-md-8"><span class="primary_reason"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Other (please specify)') !!}</strong></div>
              <div class="col-md-8"><span class="other_reason"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('What would say was the highlight of your experience at the church?') !!}</strong></div>
              <div class="col-md-8"><span class="experience"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Other (please specify)') !!}</strong></div>
              <div class="col-md-8"><span class="exp_other"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('How long ago did you leave the church?') !!}</strong></div>
              <div class="col-md-8"><span class="leave_church"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('How would you describe your involvement in your current church?') !!}</strong></div>
              <div class="col-md-8"><span class="current_church_involve"></span></div>
          </div>
           <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('Other (please specify)') !!}</strong></div>
              <div class="col-md-8"><span class="other_church_involve"></span></div>
          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="col-md-12">
              <div class="col-md-4"><strong>{!! trans('If you are willing, please share anything that you feel is important to help the church become better.') !!}</strong></div>
              <div class="col-md-8"><span class="help_church"></span></div>
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
            var setUrl = "{{ URL::to('attend_church') }}/"+id;
            $.ajax({
                url: setUrl,
                type: 'GET',
                async: true,
                cache:false,
                success: function(data){
                    if(data){
                        var getData = JSON.parse(data);
                        var setData = getData['attendchurch'];
                        var setDatePosted  = moment(setData.created_at).format('D-MMMM-YY');
                       if(setData.primary_reason == null || setData.primary_reason == ''){
                          $(".primary_reason").text("-");
                        } else {
                          $(".primary_reason").text(setData.primary_reason);
                        }
                        if(setData.other_reason == null || setData.other_reason == ''){
                          $(".other_reason").text("-");
                        } else {
                          $(".other_reason").text(setData.other_reason);
                        }
                        if(setData.experience == null || setData.experience == ''){
                          $(".experience").text("-");
                        } else {
                          $(".experience").text(setData.experience);
                        }
                        if(setData.exp_other == null || setData.exp_other == ''){
                          $(".exp_other").text("-");
                        } else {
                          $(".exp_other").text(setData.exp_other);
                        }
                        if(setData.leave_church == null || setData.leave_church == ''){
                          $(".leave_church").text("-");
                        } else {
                          $(".leave_church").text(setData.leave_church);
                        }
                        if(setData.current_church_involve == null || setData.current_church_involve == ''){
                          $(".current_church_involve").text("-");
                        } else {
                          $(".current_church_involve").text(setData.current_church_involve);
                        }
                        if(setData.other_church_involve == null || setData.other_church_involve == ''){
                          $(".other_church_involve").text("-");
                        } else {
                          $(".other_church_involve").text(setData.other_church_involve);
                        }
                        if(setData.help_church == null || setData.help_church == ''){
                          $(".help_church").text("-");
                        } else {
                          $(".help_church").text(setData.help_church);
                        }
                       $(".created_at").text(setDatePosted);
                    } else {
                        $(".primary_reason").text("");
                        $(".other_reason").text("");
                        $(".experience").text("");
                        $(".exp_other").text("");
                        $(".leave_church").text("");
                        $(".current_church_involve").text("");
                        $(".other_church_involve").text("");
                        $(".help_church").text("");
                        $(".created_at").text("");
                       
                    }
                }
            });
            $("#attending_church").modal('show');

        };
</script>
@endsection