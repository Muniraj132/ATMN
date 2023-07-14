<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
 <title>@yield('title') - {{ trans('main.title') }}</title>
  
  {!! Html::style('public/frontend/district/semantic.min.css') !!}
  
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

  <style type="text/css">
  body {
    background-color: #FFFFFF;
  }
  .ui.menu .item img.logo {
    margin-right: 1.5em;
  }
  .main.container {
    margin-top: 7em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    
  }
  </style>

</head>
<body>

  @include('frontend/includes/header')

  <div class="ui main container">
   @yield('content')
  </div>

  @include('frontend/includes/footer')

</body>

</html>
