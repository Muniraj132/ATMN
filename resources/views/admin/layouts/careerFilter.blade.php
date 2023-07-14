<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <link rel="shortcut icon" href="{{ URL::to('public/images/fave-icon.png') }}">   
    <title>Career - Don Bosco College, Yelagiri Hills</title>
    <!--Core CSS -->
    {!! Html::style('public/bs3/css/bootstrap.min.css') !!}
    {!! Html::style('public/css/bootstrap-reset.css') !!}
    {!! Html::style('public/font-awesome/css/font-awesome.css') !!}
    {!! Html::style('public/js/data-tbl/jquery.dataTables.min.css') !!}
    <!-- Custom styles for this template -->
    {!! Html::style('public/css/style.css') !!}
    

</head>
<body>
<section id="container">
<!--header start-->

@include('admin.layouts.career_header')

<!--header end-->
<!--sidebar start-->

@include('admin.layouts.career_sidebarMain')

<!--sidebar end-->
<section id="main-content">
<section class="wrapper">
<!--main content start-->

<!--main content end-->
<!-- Content start -->
@include('admin.layouts.alerts')
@yield('content')

<!-- Content end -->

</section>
</section>
<!--right sidebar start-->

@include('admin.layouts.sidebarHide')

<!--right sidebar end-->

</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
{!! Html::script('public/js/jquery.js') !!}
{!! Html::script('public/bs3/js/bootstrap.min.js') !!}
{!! Html::script('public/js/jquery.nicescroll.js') !!}
{!! Html::script('public/js/jquery.dcjqaccordion.2.7.js') !!}

<!--jQuery Flot Chart-->
<!-- {!! Html::script('public/js/jquery.customSelect.min.js') !!} -->
<!--common script init for all pages-->
{!! Html::script('public/js/scripts.js') !!}
{!! Html::script('public/js/data-tbl/jquery.dataTables.min.js') !!}

<!--script for this page-->
</body>
</html>