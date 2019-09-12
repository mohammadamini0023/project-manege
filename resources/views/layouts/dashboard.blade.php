<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-image="">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    @php
                    use Illuminate\Support\Facades\DB;
                    $title = DB::table('setting')->where('key', 'title')->pluck('value');
                    echo($title[0]);
                    @endphp
                </a>
            </div>
            <ul class="nav">
{{--                <li class="nav-item {{ (Route::is('admin.index')) ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('admin.index') }}">--}}
{{--                        <i class="nc-icon nc-chart-pie-35"></i>--}}
{{--                        <p>Dashboard</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item {{ (Route::is('admin.user.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Users List</p>
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('admin.vehicle.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.vehicle.index') }}">
                        <i class="nc-icon nc-bus-front-12"></i>
                        <p>Vehicle History</p>
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('admin.serviceVehicle.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.serviceVehicle.index') }}">
                        <i class="nc-icon nc-delivery-fast"></i>
                        <p>Vehicles Service</p>
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('admin.service.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.service.index') }}">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Services List</p>
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('admin.activity.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.activity.index') }}">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Recent Activity</p>
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('admin.setting.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.setting.index') }}">
                        <i class="nc-icon nc-settings-90"></i>
                        <p>Site Settings</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="#pablo">@yield('title')</a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.search.index') }}" class="nav-link">
                                <i class="nc-icon nc-zoom-split"></i>
                                <span class="d-lg-block">&nbsp;Search</span>
                            </a>
                        </li>
                    </ul>
{{--                    <ul class="nav navbar-nav mr-auto">--}}
{{--                        <form class="navbar-form navbar-left navbar-search-form" role="search" _lpchecked="1">--}}
{{--                            <div class="input-group" style="margin-left: 30%;">--}}
{{--                                <i class="nc-icon nc-zoom-split"></i>--}}
{{--                                <input type="text" value="" class="form-control" placeholder="Search...">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </ul>--}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}">
                                <span class="no-icon">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.skycomputer.com">Sky Computer</a>
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
<!-- <div class="fixed-plugin">
<div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
    </a>

    <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Style</li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger">
                <p>Background Image</p>
                <label class="switch">
                    <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                </label>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <p>Filters</p>
                <div class="pull-right">
                    <span class="badge filter badge-black" data-color="black"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-orange" data-color="orange"></span>
                    <span class="badge filter badge-red" data-color="red"></span>
                    <span class="badge filter badge-purple active" data-color="purple"></span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="header-title">Sidebar Images</li>

        <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-1.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-3.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="..//assets/img/sidebar-4.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-5.jpg" alt="" />
            </a>
        </li>

        <li class="button-container">
            <div class="">
                <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
            </div>
        </li>

        <li class="header-title pro-title text-center">Want more components?</li>

        <li class="button-container">
            <div class="">
                <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
            </div>
        </li>

        <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

        <li class="button-container">
            <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
            <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
        </li>
    </ul>
</div>
</div>
-->
</body>
<!--   Core JS Files   -->
<div>
    @yield('script')
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).removeClass('Active')
        });
    </script>
</div>

</html>

