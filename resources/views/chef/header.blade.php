<!doctype html>
<html lang="en" class="html dark-theme">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv='Expires' content='0'>
    <meta http-equiv='Pragma' content='no-cache'>
    <meta http-equiv='Cache-Control' content='no-cache'>
    <!--favicon-->

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('admin-assets/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin-assets/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/dataTable-checkboxCss.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/dselect/dselect.css') }}">
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/blitzer/jquery-ui.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/yearpicker/yearpicker.css') }}">
    @stack('title')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('admin-assets/assets/images/logo.png') }}" class="logo-icon logo-big"
                        alt="logo icon">
                    <img src="{{ asset('admin-assets/assets/images/logo-sm.png') }}" class="logo-icon d-none logo-sm"
                        alt="logo icon">
                </div>

                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('chef.indexView') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle text-warning'></i>
                        </div>
                        <div class="menu-title text-warning">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('chef.allOrder') }}">
                        <div class="parent-icon"><i class="bx bx-user-pin text-primary"></i>
                        </div>
                        <div class="menu-title">All Orders</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <h4 class="text-warning">CHEF PANEL</h4>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="#" data-bs-toggle="tooltip"
                                    data-bs-title="Full Screen Mode" data-bs-placement="auto" onclick="fullScreen()"
                                    id="fullscreen-btn"> <i class='bx bx-fullscreen' id="fullscreen-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link theme-change text-info" href="#" id="theme-change-btn"
                                    onclick="changeTheme()" data-bs-toggle="tooltip" data-bs-title="Switch to dark mood"
                                    data-bs-placement="auto"> <i class='bx bx-moon '></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('admin-assets/assets/images/digi-user.png') }}" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Dine Wise</p>
                                <p class="designattion mb-0">Digital Marketing Agency</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('chef.logout') }}"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
