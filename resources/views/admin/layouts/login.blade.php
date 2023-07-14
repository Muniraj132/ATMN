<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">    
    <link rel="shortcut icon" href="{{ URL::to('public/admin/images/ico/favicon.ico') }}">   
    <title>Login - YR Instutions</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="/public/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!--Core CSS -->
    
   

    <!-- BEGIN: Vendor CSS-->
    {!! Html::style('public/admin/vendors/css/vendors.min.css') !!}
    {!! Html::style('public/admin/vendors/css/forms/icheck/icheck.css') !!}
    {!! Html::style('public/admin/vendors/css/forms/icheck/custom.css') !!}
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
    {!! Html::style('public/admin/vendors/css/colors.min.css') !!}
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    {!! Html::style('public/admin/vendors/css/components.min.css') !!}
   <!--  <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
    <!-- END: Custom CSS-->

  </head>
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

    

      <!-- Content start -->

      @yield('content')
 
      <!-- Content end -->

    <!--Core js-->
    {!! Html::script('public/admin/js/jquery.js') !!}
    {!! Html::script('public/admin/bs3/js/bootstrap.min.js') !!}



    <!-- BEGIN: Vendor JS-->
    {!! Html::script('public/admin/vendors/js/vendors.min.js') !!}
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {!! Html::script('public/admin/vendors/js/forms/icheck/icheck.min.js') !!}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    {!! Html::script('public/admin/js/core/app-menu.min.js') !!}
    {!! Html::script('public/admin/js/core/app.min.js') !!}
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>

