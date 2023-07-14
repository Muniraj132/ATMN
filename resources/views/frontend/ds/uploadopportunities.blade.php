@extends('frontend.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Session;
use App\Helpers\ATMNHelper;
use Illuminate\Support\Facades\Auth;

$isUSER = ATMNHelper::isUSER();
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="col-md-9" id="bri_ind_container">
    <div class="php-email-form">
        <div class="row cards">
            <div class="row bar">
                <label>Current Opportunities</label>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="php-email-form">
                        <form id="opportunitystore">
                            @csrf
                            <div class="row">
                                @if (session('success'))
                                    <div class="alert alert-success" id="success">
                                        {{ session('success') }}
                                    </div>
                                    <br>
                                @endif
                                <div class="alert alert-success" id="success" style='display: none;'>
                                  Current Opportunities Added Successfully.
                                </div>
                                <div class="alert alert-info" id="updatesuccess" style='display: none;'>
                                  Current Opportunities Updated Successfully.
                                </div>
                                <div class="alert alert-danger" id="deletesuccess" style='display: none;'>
                                  Current Opportunities Deleted Successfully.
                                </div>
                                <br>
                                
                                <div class="col-lg">
                                    <label>Current Opportunities <span class="astrict">*</span></label>
                                    <textarea class="form-control" name="opportunities" id="opportunities" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-lg-5" >
                                    <!-- Image loader -->
                                        <label></label>
                                        <div id='loader' style='display: none;'>
                                          <img src="{{asset('assets/img/gif/ajaxload.gif')}}" width='32px' height='32px'>
                                        </div>
                                    <!-- Image loader -->
                                </div>
                                <div class="col-lg-7">
                                    <button class="opportunities">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="php-email-form">
                        <table id="uploadopportunities" class="table table-hover responsive uploadopportunities data-table" style="width:100%">
                            <thead>
                              <tr>
                                <th width="300px">Opportunities</th>
                                <th>Upload Date</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container">
              <!-- Modal -->
              <div class="modal" id="myModal" >
              <div class="modal-dialog modal-md modal-centered">
                <!-- Modal content-->
                <div class="modal-content">

                  <div class="modal-header" style="background-color:#801214;color: #fff;">
                    <h4>Current Opportunities Edit</h4>
                    <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
                  </div>
                  <form id="opportunitiesEdit">                                                     
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Current Opportunity <span class="astrict">*</span></label>
                            <textarea class="form-control" name="opportunities" id="opportunitieseditdata" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Current Opportunity Status</label>
                            <input type="hidden" id="active_status_val" value="">
                            <select class="form-select" name="active_status" id="active_status">
                                <option value="Publish">Publish</option>
                                <option value="Unpublish">Unpublish</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <input type="hidden" id="opportunitiesdataid" name="id" value="">
                  <div class="modal-footer">
                    <button class="btn btn-add m-t-15 waves-effect mb-3" id="opportunitiesUpdate" style="background-color: #801214;color:#fff;" >{!! trans('main.update') !!}</button>
                    <button class="btn btn-add m-t-15 waves-effect mb-3" id="closeModal" type="button" style="background-color: #801214;color:#fff;" >{!! trans('main.close') !!}</button>
                  </div>
                </form>
              </div>

              </div>
              </div>
            </div>

            <div class="container">
              <!-- Delete Modal -->
              <div class="modal" id="myModalDel" >
              <div class="modal-dialog modal-md modal-centered">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#801214;color: #fff;">
                    <h4>Delete</h4>
                    <button type="button" id="CloseModalDel" class="close" data-dismiss="modal" >&times;</button>
                  </div>
                  <form id="opportunitiesDel">                                                      
                  <div class="modal-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="label-name" style="font-size:20px">Are you sure you want to delete?</label>
                      <input type="hidden" name="id" id="id" value="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-add m-t-15 waves-effect" id="opportunityDel" style="background-color: #801214;color:#fff;" >Yes</button>
                    <button class="btn btn-add m-t-15 waves-effect" id="closeModalDel" type="button" style="background-color: #801214;color:#fff;" >No</button>
                  </div>
                  </div>
                </form>
              </div>
              </div>
              </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>   

<script type="text/javascript">

    $(document).ready(function() {
        
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    var table = $('.uploadopportunities').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('opportunitiesget') }}",
      columns: [
          {data: 'opportunities', name: 'Opportunities',orderable: true, searchable: true},
          {data: 'created_at', name: 'Upload Date',orderable: true, searchable: true,
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
            }
          },
          {data: 'active_status', name: 'Status',orderable: true, searchable: true},
          {data: 'action', name: 'action', orderable: false, searchable: true},
      ]
    });

    $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

    $('[data-toggle="tooltip"]').tooltip();

    $("#opportunitystore").validate({
        rules: {
            opportunities : {
                required: true,
            },    
        },
        messages : {
            opportunities: {
                required: "Please enter current opportunities",
            }
        },
        submitHandler: function(form) {
            var opportunities = $("#opportunities").val();
            var token = "{{ csrf_token() }}";
            data = {
                "_token": token,
                "opportunities":opportunities,
                };
            $.ajax({
            url: "{{ url('opportunitiesstore') }}",
            method: 'post',
            data:data,
            dataType: 'json',
            beforeSend: function(){
                // Show image container
                $("#loader").show();
               },
            success: function(response){
                $("#opportunities").val('');
                table.draw();
                $("#success").show();
                },
            complete:function(response){
                // Hide image container
                $("#loader").hide();
               }

          });

        }
    });

    var $checks1 = $('input[type="checkbox"][name="activestatus"]');
      $checks1.click(function() {
         $checks1.not(this).prop("checked", false);
      });

    $("#myBtn").click(function() {
        $('#myModal').appendTo("body").modal('toggle');
    });
    $("#closeModal").click(function() {
        $('#myModal').modal('hide');
    });
    $("#CloseModal").click(function() {
        $('#myModal').modal('hide');
    });

    /*------- myAvailableDel toggle close -------*/

      $("#Del").click(function() {
          $('#myModalDel').appendTo("body").modal('toggle');
      });
      $("#closeModalDel").click(function() {
        $('#myModalDel').modal('hide');
      });
      $("#CloseModalDel").click(function() {
          $('#myModalDel').modal('hide'); 
      });

    /*------- end myAvailableForm toggle close -------*/

    $('.data-table').on('click','.opportunitiesedit',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        opportunitiesview(id,data);
    });

    $('.data-table').on('click','.opportunitiesdel',function() {
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        opportunitiesDel(id,data);
    });

    $('#opportunityDel').on('click',function(e) {
      e.preventDefault();
        var id = $("#id").val();
        var token = "{{ csrf_token() }}";
        var data = {
          'id' : id,
          "_token": token,
          };
          console.log(data);
        $.ajax({
        method : "get",
        url: "{{ route('destroyopportunities') }}",
        data : data,
          success: function(response) {
            console.log(response);
            $('#myModalDel').modal('hide');
            $("#deletesuccess").show();
            table.draw();
          }
       });
    });


    $("#opportunitiesEdit").validate({
        rules: {
            opportunities : {
                required: true,
                maxlength: 255,
            },    
        },
        messages : {
            opportunities: {
                required: "Please enter current opportunities",
                maxlength: "Please enter no more than {0} characters"
            }
        },
        submitHandler: function(form) {
            var id = $("#opportunitiesdataid").val();
            var token = "{{ csrf_token() }}";
            var active_status = $("#active_status").val();
            var opportunities = $("#opportunitieseditdata").val();
            var data = {
              'id' : id,
              "_token": token,
              "opportunities": opportunities,
              "active_status" : active_status
              };
            opportunitiesUpdate(data);
        }
    });


    // $('#opportunitiesUpdate').on('click',function(e) {
    //   e.preventDefault();
    // });

    function opportunitiesview(id,data){
        var id = data; // Address
        var data = {'id' : id};
        $.ajax({
        url : "{{Route('opportunitiesview')}}",
        method : "GET",
        data : data,
            success: function(response) {
                console.log(response);
                $( "#opportunitiesdataid" ).empty().val(response.opportunitiesData['id']);
                $( "#opportunitieseditdata" ).empty().val(response.opportunitiesData['opportunities']);
                if(response.opportunitiesData['active_status'] == 'Publish' ){
                    $('#active_status option[value="Publish"]').attr("selected", "selected");
                }else{
                    $('#active_status option[value="Unpublish"]').attr("selected", "selected");
                }
            }
        });
        $('#myModal').appendTo("body").modal('toggle');
    }

    function opportunitiesUpdate(data){
        var data = data;
        $.ajax({
        url : "{{Route('opportunitiesupdate')}}",
        method : "post",
        data : data,
            success: function(response) {
                console.log(response);
                $('#myModal').modal('hide');
                $("#updatesuccess").show();
                table.draw();
            }
        });
        $('#myModal').appendTo("body").modal('toggle');
    }

    function opportunitiesDel(id,data){
      var id = data; // Address
      var data = {'id' : id};
      $.ajax({
        method : "GET",
        url: "{{ route('opportunitiesview') }}",
        data : data,
          success: function(response) {
            console.log(response);
            $('#id').empty().val(response.opportunitiesData['id']);
          }
       });
      $('#myModalDel').appendTo("body").modal('toggle');
    }

});
// Disable Success Message
  function disabledsuccessmsg() {
    setTimeout(function() {
      document.getElementById("success").style.display = "none";
    }, 100);
    setTimeout(function() {
      document.getElementById("deletesuccess").style.display = "none";
    }, 100);
    setTimeout(function() {
      document.getElementById("updatesuccess").style.display = "none";
    }, 100);
  }
  document.getElementById("bri_ind_container").addEventListener("click", disabledsuccessmsg);

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

 
@endsection