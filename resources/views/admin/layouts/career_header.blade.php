<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{ url('career/index') }}" class="logo">
        <img typeof="foaf:Image" src="{{ URL::to('public/frontend/images/bosco.png') }}" style="width: 159px;
position: relative;
top: -0.6em; "   alt="South Campus Arch - Don Bosco College University" /> 
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
                
                   <img alt="" src="{{ URL::to('public/frontend/images/no-img.png') }}">
                    <!-- <img alt="" src="assets/images/admin.png" width="34px" height="34px"> -->
                    <span class="username">Staff</span>
                    <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li>
                    <a href="<?php echo URL::to('user_login/logout'); ?>"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                       <i class="fa fa-key"></i> Logout
                    </a>

                    <form id="logout-form" action="<?php echo URL::to('user_login/logout'); ?>" method="POST" style="display: none;">
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