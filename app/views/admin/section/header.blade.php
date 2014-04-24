
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <div class="logo">
            <a href="" class="logo_link">
                {{ System::item('site.title') }}
            </a>
        </div>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
        <div class="toggle-right-box visible-xs">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?php //echo $userProfile->avatar; ?>">
                    <span class="username">{{ User::name(Auth::user()->user_id) }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href=""><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href=""><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href=""><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <li>
                <div class="toggle-right-box hidden-xs">
                    <div class="fa fa-bars"></div>
                </div>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</header>