
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a class="h5 text-white" href="index.html">
                                <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">ne</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content side-content-full">


                            <ul class="nav-main">

                                @if(Auth::check() && Auth::user()->role == "user")
                                <li>
                                    <a href="{{route('dashboard')}}"><i class="si si-speedometer"></i>
                                        <span class="sidebar-mini-hide">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('new-transaction')}}"><i class="si si-refresh"></i>
                                        <span class="sidebar-mini-hide">New Transaction</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="sidebar-mini-hide">Commissions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user-calendar')}}"><i class="si si-calendar"></i>
                                        <span class="sidebar-mini-hide">Calendar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""><i class="si si-note"></i>
                                        <span class="sidebar-mini-hide">Form</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="sidebar-mini-hide">Registration</span>
                                    </a>
                                </li>
                            
                                <li>
                                    <a href="{{route('customer')}}">
                                       <span class="sidebar-mini-hide">Customers</span>     
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user-account-view') }}">
                                        <i class="si si-user"></i><span class="sidebar-mini-hide">Account</span>
                                    </a>
                                </li>
                                @endif

                                @if(Auth::check() && Auth::user()->role == "admin")

                                <li>
                                    <a href="{{route('admin-transaction')}}"><i class="si si-speedometer"></i>
                                        <span class="sidebar-mini-hide">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin-sales')}}"><i class="si si-speedometer">
                                    </i>
                                        <span class="sidebar-mini-hide">Sales</span>    
                                    </a>
                                    
                                   
                                </li>
                                 <li>
                                    <a href="{{route('admin-form-view')}}"><i class="si si-note"></i>
                                        <span class="sidebar-mini-hide">Form</span>
                                    </a>
                                </li>
                                    <li>
                                    <a href="{{route('admin-events')}}">
                                       <span class="sidebar-mini-hide">Events</span>     

                                    </a>

                                </li>
                                
                                 
                                    <li>
                                    <a href="{{route('admin-event-calendar')}}">
                                        <i class="si si-calendar"></i>
                                       <span class="sidebar-mini-hide">Calendar Events</span>     

                                    </a>

                                </li>
                                @endif               
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            