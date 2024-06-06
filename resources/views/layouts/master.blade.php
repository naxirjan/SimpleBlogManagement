<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/font/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/glide.core.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/component-custom-switch.min.css')}}" />
    @yield('cssStyles')
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
</head>

<body id="app-container" class="menu-default show-spinner">

<!-- Nav bar Top -->
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left"><a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1"/>
                <rect x="0.48" y="7.5" width="7" height="1"/>
                <rect x="0.48" y="15.5" width="7" height="1"/>
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1"/>
                <rect x="1.56" y="7.5" width="16" height="1"/>
                <rect x="1.56" y="15.5" width="16" height="1"/>
            </svg>
        </a><a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1"/>
                <rect x="0.5" y="7.5" width="25" height="1"/>
                <rect x="0.5" y="15.5" width="25" height="1"/>
            </svg>
        </a>
        <img class="ml-3 d-none d-md-inline-block" width="80" height="65" src="{{asset('assets/img/logos/main-logo.png')}}">
        <a style="font-size: 20px;font-weight: bold;" class="" href="https://1.envato.market/5kAb">Blog Management</a>
    </div>

    <div class="navbar-right">

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="name">{{Auth::user()->name}}</span>
                <span><img alt="Profile Picture" src="{{asset('assets/img/profiles/profile-pic.png')}}"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="/account">Account</a>
                <a class="dropdown-item" href="/logout">Sign out</a>
            </div>
        </div>
    </div>
</nav>

<!-- Menu/SubMenu-->
<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            @php
                $urlSegment = Request::segment(1);
            @endphp
            <ul class="list-unstyled">
                <li class="{{($urlSegment == "posts" ? 'active' : '')}}"><a href="/posts" class="font-weight-bold"><i class="iconsminds-blogger"></i> <span>Posts</span></a></li>
                <li class="{{($urlSegment == "account" ? 'active' : '')}}"><a href="/account" class="font-weight-bold"><i class="iconsminds-profile"></i> <span>Account</span></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Content -->
@yield('content')

<!-- Footer -->
<footer class="page-footer">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6"><p class="mb-0 text-muted">Blog Management &copy; {{date("Y")}}</p></div>
            </div>
        </div>
    </div>
</footer>

<!-- JS Scripts -->
<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/chartjs-plugin-datalabels.js')}}"></script>
<script src="{{asset('assets/js/vendor/moment.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/progressbar.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.barrating.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/select2.full.js')}}"></script>
<script src="{{asset('assets/js/vendor/nouislider.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/vendor/Sortable.js')}}"></script>
<script src="{{asset('assets/js/vendor/mousetrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/glide.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dore.script.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/jsSchoolScript.js')}}"></script>
@yield('jsScripts')

</body>
</html>
