<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{ url('admin/dashboard') }}" class="logo">
        <img typeof="foaf:Image" src="" style="width: 159px;position: relative;
margin-left: 2em;font-size: larger;" alt="PEAK" /> 
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
           <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                @if (!empty(Auth::user()->profile_picture))
                    <img src="{!! URL::to('/uploads/') !!}/userProfile/{{ Auth::user()->profile_picture }}" width="34px" height="34px" >
                    <!-- <img alt="" src="assets/images/admin.png" width="34px" height="34px"> -->
                     <span class="username">{!! Auth::user()->name !!}</span>
                    <b class="caret"></b>
                @else
                   <img alt="" src="{{ URL::to('public/images/avatar1_small.jpg') }}">
                    <!-- <img alt="" src="assets/images/admin.png" width="34px" height="34px"> -->
                    <span class="username">{!! Auth::user()->name !!}</span>
                    <b class="caret"></b>
                @endif
            </a>
            <ul class="dropdown-menu extended logout">
				<li>
                    <a href="{{ url('profileView') }}/{{ auth()->user()->id }}">
                       <i class="fa fa-user"></i> Profile
                    </a>
                </li>
			     <li class="sub-menu">
                    <a href="{{ url('changePassword') }}/{{ auth()->user()->id }}">
                        <i class="fa fa-laptop"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                       <i class="fa fa-key"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>