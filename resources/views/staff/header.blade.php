<!doctype html>
<html lang="en" class="html dark-theme">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='Expires' content='0'>
    <meta http-equiv='Pragma' content='no-cache'>
    <meta http-equiv='Cache-Control' content='no-cache'>
    <!--favicon-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

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

@php
    $loginData = loginData(session()->get('abcdefgh'));
    $session_user_id = $loginData['user_id'];
@endphp

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
                    <a href="{{ route('staff.indexView') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('staff.profile', $session_user_id) }}">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">Profile</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-spreadsheet"></i>
                        </div>
                        <div class="menu-title">Attendance</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('staff.addAttendance') }}"><i class="bx bx-right-arrow-alt"></i>Today's
                                Attendance</a>
                        </li>
                        <li> <a href="{{ route('staff.showAttendance') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Attendance Details</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-user-minus"></i>
                        </div>
                        <div class="menu-title">Leave</div>
                    </a>
                    <ul>

                        <li> <a href="{{ route('staff.leaveRequest') }}"><i class="bx bx-right-arrow-alt"></i>Leave
                                Request</a>
                        </li>
                        <li> <a href="{{ route('staff.showLeaveRequest') }}"><i class="bx bx-right-arrow-alt"></i>Leave
                                Details</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-wallet"></i>
                        </div>
                        <div class="menu-title">Payout</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('staff.accountDetails') }}"><i class="bx bx-right-arrow-alt"></i>Account
                                Details</a>
                        </li>
                        <li> <a href="{{ route('staff.incrementedPaymentDetails') }}"><i
                                    class="bx bx-right-arrow-alt"></i>View Incremented Payment</a> </li>
                        <li> <a href="{{ route('staff.advancePaymentDetails') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Advance Payment</a> </li>
                        <li> <a href="{{ route('staff.receivedPaymentDetails') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Received Payment </a> </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('staff.allOrder') }}">
                        <div class="parent-icon"><i class="fa-regular fa-burger-glass"></i>
                        </div>
                        <div class="menu-title">Orders</div>
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
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="tooltip"
                                    data-bs-title="Full Screen Mode" data-bs-placement="auto" onclick="fullScreen()"
                                    id="fullscreen-btn"> <i class='bx bx-fullscreen' id="fullscreen-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link theme-change" href="#" id="theme-change-btn"
                                    onclick="changeTheme()" data-bs-toggle="tooltip"
                                    data-bs-title="Switch to dark mood" data-bs-placement="auto"> <i
                                        class='bx bx-moon'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            @php
                                $staffPro = DB::table('staffs')
                                    ->where('uid', '=', $session_user_id)
                                    ->get();
                                
                            @endphp


                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ $staffPro[0]->name }}</p>
                                <p class="designattion mb-0">{{ $staffPro[0]->designation }} </p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"
                                    href="{{ route('staff.profile', $session_user_id) }}"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                            </li>

                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('staff.logout') }}"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
