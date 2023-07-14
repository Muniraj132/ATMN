<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::to('public/images/fave-icon.png') }}">   
    <title>Career - Don Bosco College, Yelagiri Hills</title>
    <!--Core CSS -->
    {!! Html::style('public/bs3/css/bootstrap.min.css') !!}
    {!! Html::style('public/js/jquery-ui/jquery-ui-1.10.1.custom.min.css') !!}
    {!! Html::style('public/css/bootstrap-reset.css') !!}
    {!! Html::style('public/font-awesome/css/font-awesome.css') !!}
    <!-- {!! Html::style('public/js/advanced-datatable/css/demo_page.css') !!} -->
    <!-- {!! Html::style('public/js/advanced-datatable/css/demo_table.css') !!} -->
    <!-- {!! Html::style('public/js/data-tables/DT_bootstrap.css') !!} -->
    {!! Html::style('public/js/data-tbl/jquery.dataTables.min.css') !!}

    {!! Html::style('public/js/jvector-map/jquery-jvectormap-1.2.2.css') !!}
    {!! Html::style('public/css/clndr.css') !!}
    <!--clock css-->
    {!! Html::style('public/js/css3clock/css/style.css') !!}
    <!--Morris Chart CSS -->
    {!! Html::style('public/js/morris-chart/morris.css') !!}
    <!-- Custom styles for this template -->
    {!! Html::style('public/css/style.css') !!}
    {!! Html::style('public/css/style-responsive.css') !!}
    {!! Html::style('public/css/bootstrap-switch.css') !!}

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
{!! Html::script('public/js/jquery-ui/jquery-ui-1.10.1.custom.min.js') !!}
{!! Html::script('public/bs3/js/bootstrap.min.js') !!}
{!! Html::script('public/js/jquery.dcjqaccordion.2.7.js') !!}
{!! Html::script('public/js/jquery.scrollTo.min.js') !!}
{!! Html::script('public/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js') !!}
{!! Html::script('public/js/jquery.nicescroll.js') !!}
{!! Html::script('public/js/skycons/skycons.js') !!}
{!! Html::script('public/js/jquery.scrollTo/jquery.scrollTo.js') !!}
{!! Html::script('http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}
{!! Html::script('public/js/calendar/clndr.js') !!}
{!! Html::script('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js') !!}
{!! Html::script('public/js/calendar/moment-2.2.1.js') !!}
{!! Html::script('public/js/evnt.calendar.init.js') !!}
{!! Html::script('public/js/jvector-map/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('public/js/jvector-map/jquery-jvectormap-us-lcc-en.js') !!}
<!--clock init-->
{!! Html::script('public/js/css3clock/js/css3clock.js') !!}
<!--Easy Pie Chart-->
{!! Html::script('public/js/easypiechart/jquery.easypiechart.js') !!}
<!--Sparkline Chart-->
{!! Html::script('public/js/sparkline/jquery.sparkline.js') !!}

<!--jQuery Flot Chart-->
{!! Html::script('public/js/jquery.customSelect.min.js') !!}
<!--common script init for all pages-->
{!! Html::script('public/js/scripts.js') !!}
<!--script for this page-->
<!-- {!! Html::script('public/js/advanced-datatable/js/jquery.dataTables.js') !!}
{!! Html::script('public/js/data-tables/DT_bootstrap.js') !!}
{!! Html::script('public/js/dynamic_table_init.js') !!} -->
{!! Html::script('public/js/data-tbl/jquery.dataTables.min.js') !!}
{!! Html::script('public/js/ckeditor/ckeditor.js') !!}
{!! Html::script('public/js/toggle-init.js') !!}
<!--{!! Html::script('public/js/bootstrap-switch.js') !!}-->

<!--script for this page-->
</body>
</html>