<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ATMN RECRUITMENT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">   
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/bd-wizard.css')}}">

  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />


</head>

<body>
  @include('frontend.includes.topbar')
  @include('frontend.includes.header')
  <!-- class="{{ request()->is('sites/*/edit') ? 'active' : '' }}" -->

  <main id="main">
  @include('frontend.includes.bread_crumbs')
<section id="form" class="contact">
  <div class="container aos-init aos-animate" data-aos="fade-up">

    <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

      <div class="row">
        @include('frontend.includes.sidebar') 
        @yield('content')
      </div>
    </div>

  </div>
</section>

  </main>
  @include('frontend.includes.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<style>
  .help-block{
    color: red;
  }
</style>

</body>
<script type="text/javascript">

  function getnameuser(id){
    var username;
    data = {'id' : id};
    $.ajax({
        method : "get",
        url: "{{ route('getname') }}",
        data : data,
        async: false,
        success: function(response) {
            username = namecaptalize(response.success);       
        },
    });
    return username; 
  }

  function namecaptalize(name){
      firstChar = name.substring( 0, 1 ).toUpperCase();
      tail = name.substring( 1 ); 
      user_name = firstChar + tail; 
      return user_name;
  }

  /* ------- start date to end date Restriction ------- */
  function daterestriction(startdate,enddate,getvalstart,getvalend){
      if(getvalstart==""){
          valstartDate = new Date().toISOString().slice(0, 10);
          valendDate = new Date().toISOString().slice(0, 10);
          let end_date = document.querySelector("#"+enddate+"").min = valendDate;
      }else{
          valstartDate = getvalstart;
          valendDate = getvalend;
          let end_date = document.querySelector("#"+enddate+"").min = valstartDate;
      }
      let start_date = document.querySelector("#"+startdate+"").min = valstartDate;
      var start = document.getElementById(startdate);
      var end = document.getElementById(enddate);
      start.addEventListener('change',function() {   
          if (start.value){
            end.min = start.value;
          }
          
      }, false);
  }
  /* -------end start date to end date Restriction ------- */
</script>
<script src="{{ asset('assets/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<!-- datatables scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js')}}"></script>


</html>