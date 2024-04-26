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

    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/yearpicker/yearpicker.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/datatable/custom-btn.css') }}">
    @stack('title')
    @stack('style')
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
                    <a href="{{ route('admin.indexView') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle text-primary'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fab fa-product-hunt text-primary"></i>
                        </div>
                        <div class="menu-title">Products</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.showCategory') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Products
                                Category</a></li>
                        <li><a href="{{ route('admin.showPricingUnit') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Pricing
                                Unit</a></li>
                        <li><a href="{{ route('admin.addProducts') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Products</a> </li>
                        <li><a href="{{ route('admin.showProducts') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Products
                                Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-solid fa-shelves text-primary"></i>
                        </div>
                        <div class="menu-title">Inventory</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.addMaterialIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Material</a></li>
                        <li><a href="{{ route('admin.showMaterial') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Material
                                Details</a></li>
                        <li><a href="{{ route('admin.showProducts') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Products
                                Stock</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-solid fa-table-picnic text-primary"></i>
                        </div>
                        <div class="menu-title">Table</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.addTableIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Tables</a></li>
                        <li><a href="{{ route('admin.showTable') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Show
                                Tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-regular fa-user-tag text-primary"></i>
                        </div>
                        <div class="menu-title">Booking</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.addBooking') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Booking</a></li>
                        <li><a href="{{ route('admin.showBooking') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Bookings
                                Details</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-regular fa-burger-glass text-primary"></i>
                        </div>
                        <div class="menu-title">Orders</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.addOrder') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Orders</a></li>
                        <li><a href="{{ route('admin.showOrderDetails') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Orders Details</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.getCustomersData') }}">
                        <div class="parent-icon"><i class="fa-solid fa-users text-primary"></i>
                        </div>
                        <div class="menu-title">Customers</div>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-solid fa-coins text-primary"></i>
                        </div>
                        <div class="menu-title">Loyalty</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.loyaltySetup') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add Loyalty </a></li>
                        <li><a href="{{ route('admin.showLoyaltySetup') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Show Loyalty </a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-user text-primary"></i>
                        </div>
                        <div class="menu-title">Staff </div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.addStaffIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Staff</a>
                        </li>
                        <li> <a href="{{ route('admin.showStaffIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Staff
                                Details</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-wallet text-primary"></i>
                        </div>
                        <div class="menu-title">Payout</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.accountDetailsIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Account Details</a>
                        </li>
                        <li> <a href="{{ route('admin.defineSalaryIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Define Payment</a>
                        </li>
                        <li> <a href="{{ route('admin.addSalaryIncrementIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Increment Payment</a>
                        </li>
                        <li> <a href="{{ route('admin.showSalaryIncrement') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>View Incremented Payment</a> </li>
                        <li> <a href="{{ route('admin.showDefineSalaryIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>View Payment</a> </li>
                        <li> <a href="{{ route('admin.showAdvancePaymentIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Advance Payment</a> </li>
                        <li> <a href="{{ route('admin.showCreatedPayment') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Create
                                Payment</a> </li>
                        <li> <a href="{{ route('admin.showReleasedPayment') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Released Payment</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-user-minus text-primary"></i>
                        </div>
                        <div class="menu-title">Leave</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.addLeave') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Leave</a>
                        </li>
                        <li> <a href="{{ route('admin.showPendingLeave') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Pending
                                Request</a>
                        </li>
                        <li> <a href="{{ route('admin.showAllLeave') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Leave
                                Details</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-spreadsheet text-primary"></i>
                        </div>
                        <div class="menu-title">Attendance</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.addAttendance') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Take
                                Attendance</a>
                        </li>
                        <li> <a href="{{ route('admin.showAttendance') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Attendance Details</a>
                        </li>
                    </ul>
                </li>




                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-sharp fa-regular fa-images text-primary"></i>
                        </div>
                        <div class="menu-title">Media</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.addMediaIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Media</a>
                        </li>
                        <li> <a href="{{ route('admin.mediaIndex') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>All Media
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fa-regular fa-users text-primary"></i>
                        </div>
                        <div class="menu-title">Users Login</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.addUsers') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>Add
                                Users</a>
                        </li>
                        <li> <a href="{{ route('admin.showUsers') }}"><i
                                    class="bx bx-right-arrow-alt text-warning"></i>All Users
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.settings') }}"  >
                        <div class="parent-icon"><i class="fa-solid fa-gear text-primary"></i>
                        </div>
                        <div class="menu-title">Settings</div>
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
                                    id="fullscreen-btn"> <i class='bx bx-fullscreen text-warning'
                                        id="fullscreen-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link theme-change text-info" href="#" id="theme-change-btn"
                                    onclick="changeTheme()" data-bs-toggle="tooltip"
                                    data-bs-title="Switch to dark mood" data-bs-placement="auto"> <i
                                        class='bx bx-moon '></i>
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
                                <p class="user-name mb-0">
                                    {{ session('username') }}
                                </p>
                                <p class="designattion mb-0">
                                    {{ session('role') }}
                                </p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->


        @include('admin.modal')
