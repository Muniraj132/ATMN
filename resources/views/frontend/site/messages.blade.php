@extends('frontend.layouts.main')
@section('title', trans('main.message.title'))
@section('header')
@php    
    $page = 'Messages'; 
@endphp
@php use App\Helpers\STCHelper; @endphp
@section('content')
<div class="l-main-container">
<section class="b-infoblock">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="b-sort-panel">
</div>
                        <div class="row">
                            <div class="b-col-default-indent">
                                <table id="example" class="display table-list-details table  table-bordered table-hover table-striped table-padding table-condensed">
                                <thead>
                                    <tr class="success">
                                        <th>{!! trans('main.message.subject') !!}</th>
                                        <th>{!! trans('main.message.title') !!}</th>
                                        <th>{!! trans('main.receive_on') !!}</th>
                                        <th>{!! trans('main.action') !!}</th>
                                    </tr>
                                </thead>
                            <tbody>
                            @if($messages)
                            @foreach($messages as $value)
                            @if($value->viewStatus == 'Not Viewed')
                                <tr>
                                    <td style="background-color: #ccc">{!! $value->subject !!}</td>
                                    <td style="background-color: #ccc">{!! $value->message !!}</td>
                                    <td style="background-color: #ccc">{!! $value->created_at !!}</td>
                                    <th style="background-color: #ccc">
                                        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><i class="fa fa-eye" style="padding-left:25px;"></i></a>
                                    </th>
                                </tr>
                            @else
                                <tr>
                                    <td>{!! STCHelper::charRestrictionsFooterNews(@$value->subject) !!}</td>
                                    <td>{!! STCHelper::charRestrictionsNews(@$value->message) !!}</td>
                                    <td>{!! STCHelper::adminViewDate(@$value->created_at) !!}</td>
                                    <th>
                                        <a href="#" class="get_view" data-id="@php echo $value->id; @endphp" onclick="return viewPopup(@php echo $value->id; @endphp)"><i class="fa fa-eye" style="padding-left:25px;"></i></a>
                                    </th>
                                </tr>
                            @endif
                            @endforeach
                            @else
                            @endif 
                            </tbody> 
                            </table>
                            <div class="clearfix hidden-xs"></div>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
        </section>
        </div>
        <!-- Modal -->
  <div class="modal fade" id="myView" role="dialog">
    <div class="modal-dialog modal-lg mesg-pop-width">
    
      <!-- Modal content-->
      <div class="modal-content users-details-msg">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View {!! trans('main.message.title') !!}</h4>
        </div>
        <div class="modal-body message-scroll">
        <div class="col-md-12">
          <div class="col-md-3"><p><strong>{!! trans('main.message.subject') !!}</strong></p></div>
          <div class="col-md-9 user-subj"><span class="subject"></span></div>
        </div>
        <div class="col-md-12">
          <div class="col-md-3"><p><strong>{!! trans('main.message.title') !!}</strong></p></div>
          <div class="col-md-9"><span class="message"></span></div>
        </div>
        <div class="col-md-12">
              <div class="col-md-3"><strong>{!! trans('main.receive_on') !!}</strong></div>
              <div class="col-md-9"><span class="created_at"></span></div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({

        });
    });

        //View Popup
        function viewPopup(id){
            var id    = id;
            var token = '<?php echo csrf_token(); ?>';
            var setUrl = "{{ URL::to('view-messages') }}/"+id;
            $.ajax({
                url: setUrl,
                type: 'GET',
                success: function(data){ 
                    if(data){
                        var getData = JSON.parse(data);
                        var setData = getData['messages']; 
                        var setDatePosted  = moment(setData.created_at).format('D-MMMM-Y h:mm:ss A');
                        $(".subject").html(setData.subject);
                        $(".message").html(setData.message);
                        $(".created_at").text(setDatePosted);
                        //$('#example').DataTable().ajax.reload();
                        //$('#example').table().data( "table" ).refresh();
                    } else {
                        $(".subject").text("");
                        $(".message").text("");
                        $(".created_at").text("");
                        //$('#example').DataTable().ajax.reload();
                        //$('#example').table().data( "table" ).refresh();
                    }

                }
            });
            $("#myView").modal('show');
        };
    
        /*$("#myView").click(function(){
            location.reload(true);
        });*/
</script>
@stop