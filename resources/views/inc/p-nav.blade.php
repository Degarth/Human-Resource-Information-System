<nav class="navbar navbar-default top-navbar" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><strong><i class="icon fa fa-user"></i> HR System</strong></a>
        
    <div id="sideNav" href="">
    <i class="fa fa-bars icon"></i> 
    </div>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        
        <!-- /.dropdown -->
        
        <!-- /.dropdown -->
        
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

</nav>
<!--/. NAV TOP  -->
<!-- NAV SIDE  -->
<nav class="navbar-default navbar-side" role="navigation">

    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                    <a><img id="profile-img" src="{{URL::asset('/img/ss.jpg')}}" alt="profile Pic" height="60" width="60" style="margin:0px 10px 0px 10px; border-radius:50%; border: 3px solid #F36A5A;">
                        Welcome David
                    </a>  
            </li>
            <li>
                <a class="{{ Request::is('/') ? 'active-menu' : null }}" href="/"><i class="fa fa-bullseye"></i> Dashboard</a>
            </li>
            <li> 
                <a class="{{ Request::is('view-employees') ? 'active-menu' : null }}"><i class="fa fa-user"></i> Employee<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="{{ Request::is('view-employees') ? 'active-menu' : null }}" href="/view-employees">View Employees</a>
                    </li>
                </ul>
            </li> 	
                    
            <li>
                <a class="{{ Request::is('my-leaves') || Request::is('leave-applications') ? 'active-menu' : null }}">
                    <i class="fa fa-bed"></i> Leave<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="{{ Request::is('my-leaves') ? 'active-menu' : null }}" href="/my-leaves">My Leaves</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('leave-applications') ? 'active-menu' : null }}" href="/leave-applications">Leave Applications</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a class="{{ Request::is('view-campus') ? 'active-menu' : null }}">
                    <i class="fa fa-campground"></i> Campus<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="{{ Request::is('view-campus') ? 'active-menu' : null }}" href="/view-campus">View Campus</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('view-department') ? 'active-menu' : null }}">
                    <i class="fa fa-building"></i> Department <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="{{ Request::is('view-department') ? 'active-menu' : null }}" href="/view-department">View Department</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
