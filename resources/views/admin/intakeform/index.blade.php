@extends('admin.layouts.subpage')
@section('title','Intake Form')
@section('content')
<section id="container" >
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <h1 class="panel-heading admin-sub-text">
                    Intake Form
                </h1>
                <div class="panel-body">
                <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr class="title-text">
                    <th>Name</th>
                    <th>Church Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(@$data)
                	@foreach($data as $value)
                	<tr class="gradeX">
                     <td>
                       {!! $value->first_name !!}
                     </td>
	                    <td>{!! $value->church_name !!}</td>

                        <td>{!! $value->email !!}</td> 

                         <td>{!! $value->phone !!}</td>                      

                        <td>{{ Carbon\Carbon::parse(@$value->created_at)->format('d F Y') }}</td>

						<td>
                        <a href="{{route('intake-form.show',array($value->id))}}"><button class="btn btn-icon waves-effect waves-light btn-warning m-b-5"><i class="fa fa-eye"></i> </button></a>
                        <a href="{{route('intake-form.destroy',array($value->id))}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-trash-o"></i></a>
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
@endsection