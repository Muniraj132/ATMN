<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                    <a href="{{ url('career/index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Career</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('career/index') }}">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span>UG Application Form</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::to('application/index') }}">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span>PG Application Form</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::to('application_form/index') }}">List</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>