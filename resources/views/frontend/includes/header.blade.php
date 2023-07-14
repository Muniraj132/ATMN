<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{!! URL::to('/') !!}" class="logo"><img src="{{ asset('assets/img/cmalliance/logo.png')}}" alt="" width="250">
      <!-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="{!! URL::to('/') !!}">Home</a></li>
          <li><a class="nav-link scrollto {{ request()->is('/#about') ? 'active' : '' }}" href="{!! URL::to('/') !!}#hero">About</a></li>
          <li><a class="nav-link scrollto {{ request()->is('/#faq') ? 'active' : '' }}" href="{!! URL::to('/') !!}#faq">FAQ</a></li>
          <li><a class="nav-link scrollto {{ request()->is('/#resource') ? 'active' : '' }}" href="{!! URL::to('/') !!}#resource">Resources</a></li>
          <li><a class="nav-link scrollto {{ request()->is('recruitment/*') ? 'active' : '' }}" href="{!! URL::to('/recruitment/dashboard') !!}">Recruitment</a></li>
          <li><a class="nav-link scrollto {{ request()->is('/#contact') ? 'active' : '' }}" href="{!! URL::to('/') !!}#contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

      
