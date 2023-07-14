  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        @if (Route::has('login'))
          @auth
            <h5>Welcome,&nbsp;{{ Auth::user()->username }}</h5> 
          @endauth
        @endif
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com/cmalliance" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/cmalliance" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/company/cmalliance" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
        @if (Route::has('login'))
          @auth
            <!-- @if(Auth::user()->user_type == "admin")
            <a href="{!! URL::to('/recruitment/dashboard') !!}" class="linkedin">Dashboard</a>
            @endif -->
            @if(Auth::user()->user_type == "admin" || Auth::user()->user_type == "ds")
            <a href="{{ url('recruitment/profile') }}" class="linkedin">Profile</a>
            @endif
          @endauth
        @endif
        @if (Route::has('login'))
          @auth
            <a href="{{ url('/logout') }}" class="linkedin"> &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out</a>
          @else
            <a href="{{ route('login') }}" class="linkedin"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
          @endauth
        @endif
      </div>
    </div>
  </section>
