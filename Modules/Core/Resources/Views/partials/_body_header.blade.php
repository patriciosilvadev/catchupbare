<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ config('app.short_name') }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('app.long_name') !!}</span>
    </a>

    <!-- Header Navbar -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>


        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="tabs tabs-horizontal nav navbar-nav navbar-left">
                <li @yield('AdminPanel')><a data-target="#tabAdminPanel" href="{{url('/adminpanel')}}">{!! Lang::get('core::lang.adminpanel') !!}</a></li>
                <li @yield('StaffPanel')><a data-target="#tabStaffPanel" href="{{url('/staffpanel')}}">{!! Lang::get('core::lang.staffpanel') !!}</a></li>
                <li @yield('TicketsPanel')><a data-target="#tabTicketsPanel" href="{{url('/ticketspanel')}}">{!! Lang::get('tickets::lang.ticketspanel') !!}</a></li>
                <li @yield('EmailPanel')><a data-target="#tabMailPanel" href="{{url('/mailpanel')}}">{!! Lang::get('email::lang.mailpanel') !!}</a></li>
                <li @yield('RelationsPanel')><a data-target="#tabRelPanel" href="{{url('/relationspanel')}}">{!! Lang::get('relations::lang.relationspanel') !!}</a>
                <li @yield('KnowledgeBase')><a data-target="#tabKbPanel" href="{{url('/kbpanel')}}">{!! Lang::get('knowledgebase::lang.kbpanel') !!}</a></li>
            </ul>

            @if ( config('app.context_help_area') && (isset($context_help_area)))
                <span class="pull-right">
                {!! $context_help_area   !!}
                </span>
            @endif

            <ul class="nav navbar-nav navbar-right">
                @if ( config('app.notification_area') )
                        <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- Staff Image -->
                                            <img src="{{ asset("/bower_components/admin-lte/dist/img/generic_user_160x160.jpg") }}"
                                                 class="img-circle" alt="Staff Image"/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li><!-- /.messages-menu -->
                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-staff text-aqua"></i> 5 new members joined today
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Task Header <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                @endif  {{--app.notification_area--}}

                        <!-- Staff Account Menu -->
                <li class="dropdown staff staff-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The staff image in the navbar-->
                        <img src="{{ Gravatar::get(Auth::user()->email , 'tiny') }}" class="staff-image"
                             alt="Staff Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The staff image in the menu -->
                        <li class="staff-header">
                            <img src="{{ Gravatar::get(Auth::user()->email , 'medium') }}" class="img-circle"
                                 alt="Staff Image"/>
                            <p>
                                {{ Auth::user()->full_name }}
                                <small>Member since {{ Auth::user()->created_at->format("F, Y") }}</small>
                            </p>
                        </li>

                        @if ( config('app.extended_staff_menu') )
                                <!-- Menu Body -->
                        <li class="staff-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        @endif

                                <!-- Menu Footer-->
                        <li class="staff-footer">

                            @if ( config('app.staff_profile_link') )
                                <div class="pull-left">
                                    {!! link_to_route('staff.profile', 'Profile', [], ['class' => "btn btn-default btn-flat"]) !!}
                                </div>
                            @endif

                            <div class="pull-right">
                                {!! link_to_route('logout', 'Sign out', [], ['class' => "btn btn-default btn-flat"]) !!}
                            </div>
                        </li>
                    </ul>
                </li>

                @if ( config('app.right_sidebar') )
                        <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{url('/kbpanel')}}">Kb Panel</a></li>
              <li><a href="{{url('/mailpanel')}}">Mail Panel</a></li>
              <li><a href="{{url('/staffpanel')}}">Staff Panel</a></li>
              <li><a href="{{url('/adminpanel')}}">Admin Panel</a></li>
            </ul>

        </div><!--  class="collapse navbar-collapse" id="navbar-collapse" -->

    </nav>
</header>
