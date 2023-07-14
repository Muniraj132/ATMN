<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <link rel="shortcut icon" href="{{ URL::to('public/admin/images/ico/favicon.ico') }}">   
    <title>YR Institute</title>
    <!--Core CSS -->
    
        <link rel="apple-touch-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/apple-icon-120.png">
        {!! Html::style('public/admin/images/ico/favicon.ico') !!}
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        {!! Html::style('public/admin/vendors/css/vendors.min.css') !!}
        {!! Html::style('public/admin/vendors/css/weather-icons/climacons.min.css') !!}
        {!! Html::style('public/admin/vendors/css/weather-icons/climacons.min.css') !!}
        {!! Html::style('public/admin/fonts/meteocons/style.min.css') !!}
        {!! Html::style('public/admin/vendors/css/charts/morris.css') !!}
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        {!! Html::style('public/admin/css/bootstrap.min.css') !!}
        {!! Html::style('public/admin/css/bootstrap-extended.min.css') !!}
        {!! Html::style('public/admin/css/colors.min.css') !!}
        {!! Html::style('public/admin/css/components.min.css') !!}
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        {!! Html::style('public/admin/css/core/menu/menu-types/vertical-menu-modern.css') !!}
        {!! Html::style('public/admin/css/core/colors/palette-gradient.min.css') !!}
        {!! Html::style('public/admin/fonts/simple-line-icons/style.min.css') !!}
        {!! Html::style('public/admin/css/core/colors/palette-gradient.min.css') !!}
        {!! Html::style('public/admin/css/pages/timeline.min.css') !!}
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        {!! Html::style('public/admin/css/style.css') !!}
        <!-- END: Custom CSS-->

</head>

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!--header start-->

@include('admin.layouts.includes.header')

<!--header end-->
<!-- BEGIN: Main Menu-->

    @include('admin/layouts/includes/sidebar')
    <!-- END: Main Menu-->


<!--main content start-->


<!--main content end-->
<!-- Content start -->
<div class="app-content content">
 <div class="content-wrapper">
@include('admin.layouts.alerts')
@yield('content')

<!-- Content end -->


</section>
<!--right sidebar start-->



<!--right sidebar end-->

</section>
 </div>
  </div>
  <!-- Begin: Footer-->

    @include('admin/layouts/includes/footer')
   
  

    <!-- BEGIN: Vendor JS-->
    {!! Html::script('public/admin/vendors/js/vendors.min.js') !!}
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {!! Html::script('public/admin/vendors/js/charts/raphael-min.js') !!}
    {!! Html::script('public/admin/vendors/js/charts/morris.min.js') !!}
    {!! Html::script('public/admin/vendors/js/extensions/unslider-min.js') !!}
    {!! Html::script('public/admin/vendors/js/timeline/horizontal-timeline.js') !!}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    {!! Html::script('public/admin/js/core/app-menu.min.js') !!}
    {!! Html::script('public/admin/js/core/app.min.js') !!}
    {!! Html::script('public/admin/js/scripts/customizer.min.js') !!}
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {!! Html::script('public/admin/js/scripts/pages/dashboard-ecommerce.min.js') !!}
    <!-- END: Page JS-->







<!--script for this page-->
</body>
</html>