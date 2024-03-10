@extends('admin.main')
@push('title')
    <title>Staff Profile</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Profile</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Staff Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid p-0 m-0">
                <div class="row">

                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h6>Basic Details</h6>
                                <div class="text-end">
                                    <a href="{{ route('admin.editStaffIndex', $staffData[0]->id) }}"
                                        class="btn btn-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="border rounded w-100 h-100 p-2 pt-3">
                                            <div class="w-100">
                                                <div
                                                    class="d-flex justify-content-center align-items-center staff-profile-img">
                                                    @php
                                                        $fileArr = json_decode($staffData[0]->profile_picture, true);
                                                        echo getMediaFile($fileArr[0]['file_id']);
                                                    @endphp
                                                </div>
                                            </div>
                                            <div class="pt-3">
                                                <h5 class="text-center pt-3">{{ $staffData[0]->name }}</h5>
                                                <p class="text-center pt-1">{{ $staffData[0]->designation }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8 mb-3">
                                        <div class="border rounded w-100 h-100 p-2">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>UID</th>
                                                    <td>{{ $staffData[0]->uid }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $staffData[0]->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $staffData[0]->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Work Experience</th>
                                                    <td>{{ $staffData[0]->work_ex }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Of Joining</th>
                                                    <td>{{ $staffData[0]->doj }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $staffData[0]->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Documents</th>
                                                    <td><a href="#" class="text-primary"
                                                            onclick="showDocuments('{{ $staffData[0]->uid }}')">View</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="card m-0 p-0 h-100">
                            <div class="card-header">
                                <h6 style="font-size: 16px">Account & Salary Details</h6>
                            </div>
                            <div class="card-body">
                                @php
                                    $getStaffAccountDetails = DB::table('staff_account_details')
                                        ->where('uid', '=', $staffData[0]->uid)
                                        ->get();
                                @endphp
                                @if (count($getStaffAccountDetails))
                                    <table class="table table-borderless table-striped">
                                        <tr>
                                            <th>Bank Name</th>
                                            <td>{{ $getStaffAccountDetails[0]->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Account Holder Name</th>
                                            <td>{{ $getStaffAccountDetails[0]->account_holder_name }}</td>
                                        </tr>

                                        <tr>
                                            <th>Account Number</th>
                                            <td>{{ $getStaffAccountDetails[0]->acc_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>IFSC Code</th>
                                            <td>{{ $getStaffAccountDetails[0]->ifsc_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{ $getStaffAccountDetails[0]->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Google Pay</th>
                                            <td>{{ $getStaffAccountDetails[0]->gpay }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Pay</th>
                                            <td>{{ $getStaffAccountDetails[0]->phonepay }}</td>
                                        </tr>
                                        <tr>
                                            <th>Paytm</th>
                                            <td>{{ $getStaffAccountDetails[0]->paytm }}</td>
                                        </tr>
                                        @php
                                            $SalaryData = DB::table('define_salary')
                                                ->where('uid', '=', $staffData[0]->uid)
                                                ->get();
                                        @endphp
                                        @if (count($SalaryData) != 0)
                                            <tr>
                                                <th>Starting Salary</th>
                                                <td>{{ IND_num_format($SalaryData[0]->starting_salary) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Current Salary</th>
                                                <td>{{ IND_num_format($SalaryData[0]->current_salary) }}</td>

                                            </tr>
                                        @endif


                                    </table>
                                @else
                                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                        <h3>Data Not Found</h3>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3 border-bottom pb-3 profile-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#tab-attendance"
                                            role="tab" aria-selected="true" onclick="setProfileTab('#tab-attendance')">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-title">Attendance</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#tab-leave" role="tab"
                                            aria-selected="true" onclick="setProfileTab('#tab-leave')">
                                            <div class="d-flex align-items-center">

                                                <div class="tab-title">Leave</div>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#tab-payment" role="tab"
                                            aria-selected="false" tabindex="-1" onclick="setProfileTab('#tab-payment')">
                                            <div class="d-flex align-items-center">

                                                <div class="tab-title">Payment</div>
                                            </div>
                                        </a>
                                    </li>


                                </ul>
                                <div class="tab-content profile-tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tab-attendance" role="tabpanel">
                                        <div class="row pt-4">
                                            <div class="col-12 mb-3">
                                                <h5>Today's Attendance</h5>
                                            </div>

                                            @php
                                                $staffAttendanceData = DB::table('attendance')
                                                    ->where([['uid', '=', $staffData[0]->uid], ['date', '=', date('Y-m-d')]])
                                                    ->get();
                                            @endphp

                                            @if (count($staffAttendanceData) == 0)
                                                <div class="col-lg-4">
                                                    <div class="card radius-10 bg-danger bg-gradient">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <h6 class="text-dark">STATUS</h6>
                                                                    <h4 class="my-1 text-white">Not Taken</h4>
                                                                </div>
                                                                <div class="text-white ms-auto font-35"><i
                                                                        class="bx bx-user-x"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @if ($staffAttendanceData[0]->status == 'PP')
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-success bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">STATUS</h6>
                                                                        <h4 class="my-1 text-white">Present</h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-user-check"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-warning bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">LOG IN</h6>
                                                                        <h4 class="my-1 text-white">
                                                                            {{ showTime($staffAttendanceData[0]->login) }}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-log-in"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-info bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">LOG OUT</h6>
                                                                        <h4 class="my-1 text-white">
                                                                            {{ showTime($staffAttendanceData[0]->logout) }}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-log-out"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($staffAttendanceData[0]->status == 'AA')
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-danger bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">STATUS</h6>
                                                                        <h4 class="my-1 text-white">Absent</h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-user-x"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($staffAttendanceData[0]->status == 'WH')
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-success bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">STATUS</h6>
                                                                        <h4 class="my-1 text-white">Work From Home</h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-user-check"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-warning bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">LOG IN</h6>
                                                                        <h4 class="my-1 text-white">
                                                                            {{ showTime($staffAttendanceData[0]->login) }}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-log-in"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-info bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">LOG OUT</h6>
                                                                        <h4 class="my-1 text-white">
                                                                            {{ showTime($staffAttendanceData[0]->logout) }}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-log-out"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($staffAttendanceData[0]->status == 'OL')
                                                    <div class="col-lg-4">
                                                        <div class="card radius-10 bg-info bg-gradient">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h6 class="text-dark">STATUS</h6>
                                                                        <h4 class="my-1 text-white">On Leave</h4>
                                                                    </div>
                                                                    <div class="text-white ms-auto font-35"><i
                                                                            class="bx bx-user-x"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-12 p-0 mt-4">
                                                <div class="card">
                                                    <div class="card-header border-bottom">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                                                <h6 class="text-primary" style="font-size: 16px">
                                                                    Attendance Details</h6>
                                                            </div>
                                                            <div
                                                                class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                                                <div class="d-flex justify-content-end align-items-center"
                                                                    id="profile-attendance-table-action">
                                                                    <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                                        id="profile-attendance-selected">
                                                                        {{-- No. of Selected Item will show here  --}}
                                                                    </div>

                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">


                                                                        <button type="button"
                                                                            class="btn btn-danger disabled-btn"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="auto"
                                                                            data-bs-title="Delete" disabled
                                                                            onclick="deleteConfirm('profile-attendance-delete-all','attendance', 'false','','')"><i
                                                                                class="bx bx-trash"></i>
                                                                            <input type="hidden" value=""
                                                                                id="profile-attendance-delete-all">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="mt-2 mx-2 mb-3">
                                                            <table id="profile-attendance-table"
                                                                class="table table-hover table-borderless w-100 border-bottom"
                                                                style="min-width: 500px">
                                                                <thead class="bg-light border-0">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="sort text-nowrap">Status</th>
                                                                        <th class="sort text-nowrap">Login</th>
                                                                        <th class="sort text-nowrap">Logout</th>
                                                                        <th class="sort text-nowrap">Year</th>
                                                                        <th class="sort text-nowrap">Month</th>
                                                                        <th class="sort text-nowrap">Date</th>
                                                                        <th class="sort text-nowrap">Created At</th>
                                                                        <th class="sort text-nowrap">Upated At</th>
                                                                        <th class="sort text-nowrap">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- Data will load here using ajax server side . --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="tab-leave" role="tabpanel">
                                        <div class="row">
                                            @php
                                                $pendingLeave = DB::table('leaves')
                                                    ->where([['uid', '=', $staffData[0]->uid], ['status', '=', 'Pending']])
                                                    ->get()
                                                    ->count();
                                                $approvedLeave = DB::table('leaves')
                                                    ->where([['uid', '=', $staffData[0]->uid], ['status', '=', 'Approved']])
                                                    ->get()
                                                    ->count();
                                                $deniedLeave = DB::table('leaves')
                                                    ->where([['uid', '=', $staffData[0]->uid], ['status', '=', 'Denied']])
                                                    ->get()
                                                    ->count();
                                            @endphp
                                            <div class="col-lg-4">
                                                <div class="card radius-10 bg-success bg-gradient">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <h6 class="text-dark">APPROVED</h6>
                                                                <h4 class="my-1 text-white">{{ $approvedLeave }}</h4>
                                                            </div>
                                                            <div class="text-white ms-auto font-35"><i
                                                                    class="bx bx-check"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card radius-10 bg-warning bg-gradient">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <h6 class="text-dark">PENDING</h6>
                                                                <h4 class="my-1 text-white">{{ $pendingLeave }}</h4>
                                                            </div>
                                                            <div class="text-white ms-auto font-35"><i
                                                                    class="bx bx-error"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card radius-10 bg-danger bg-gradient">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <h6 class="text-dark">DENIED</h6>
                                                                <h4 class="my-1 text-white">{{ $deniedLeave }}</h4>
                                                            </div>
                                                            <div class="text-white ms-auto font-35"><i
                                                                    class="bx bx-x"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 p-0 mt-4">
                                                <div class="card">
                                                    <div class="card-header border-bottom">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                                                <h6 class="text-primary" style="font-size: 16px">
                                                                    Leave Details</h6>
                                                            </div>
                                                            <div
                                                                class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                                                <div class="d-flex justify-content-end align-items-center"
                                                                    id="profile-leave-table-action">
                                                                    <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                                        id="profile-leave-selected">
                                                                        {{-- No. of Selected Item will show here  --}}
                                                                    </div>

                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">


                                                                        <button type="button"
                                                                            class="btn btn-danger disabled-btn"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="auto"
                                                                            data-bs-title="Delete" disabled
                                                                            onclick="deleteConfirm('profile-leave-delete-all','leaves', 'false','','')"><i
                                                                                class="bx bx-trash"></i>
                                                                            <input type="hidden" value=""
                                                                                id="profile-leave-delete-all">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="mt-2 mx-2 mb-3">
                                                            <table id="profile-leave-table"
                                                                class="table table-hover table-borderless w-100 border-bottom"
                                                                style="min-width: 500px">
                                                                <thead class="bg-light border-0">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="sort text-nowrap">From</th>
                                                                        <th class="sort text-nowrap">To</th>
                                                                        <th class="sort text-nowrap">Description</th>
                                                                        <th class="sort text-nowrap">Year </th>
                                                                        <th class="sort text-nowrap">Month </th>
                                                                        <th class="sort text-nowrap">Date </th>
                                                                        <th class="sort text-nowrap">Status</th>
                                                                        <th class="sort text-nowrap">Created At </th>
                                                                        <th class="sort text-nowrap">Updated At </th>
                                                                        <th class="sort text-nowrap">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- Data will load here using ajax server side . --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-payment" role="tabpanel">

                                        <div class="row">
                                            <div class="col-12 p-0 mt-4">
                                                <div class="card">
                                                    <div class="card-header border-bottom">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                                                <h6 class="text-primary" style="font-size: 16px">
                                                                    Payment Details</h6>
                                                            </div>
                                                            <div
                                                                class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                                                <div class="d-flex justify-content-end align-items-center"
                                                                    id="profile-payment-table-action">
                                                                    <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                                        id="profile-payment-selected">
                                                                        {{-- No. of Selected Item will show here  --}}
                                                                    </div>

                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">
                                                                        <button type="button"
                                                                            class="btn btn-danger disabled-btn"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="auto"
                                                                            data-bs-title="Delete" disabled
                                                                            onclick="deleteConfirm('profile-payment-delete-all','released_payment', 'false','','')"><i
                                                                                class="bx bx-trash"></i>
                                                                            <input type="hidden" value=""
                                                                                id="profile-payment-delete-all">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="mt-2 mx-2 mb-3">
                                                            <table id="profile-payment-table"
                                                                class="table table-hover table-borderless w-100 border-bottom"
                                                                style="min-width: 500px">
                                                                <thead class="bg-light border-0">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="sort text-nowrap">Paid Amount</th>
                                                                        <th class="sort text-nowrap">Rest Amount</th>
                                                                        <th class="sort text-nowrap">Method</th>
                                                                        <th class="sort text-nowrap">Transaction Id</th>
                                                                        <th class="sort text-nowrap">Date & Time</th>
                                                                        <th class="sort text-nowrap">Created At</th>
                                                                        <th class="sort text-nowrap">Updated At</th>
                                                                        <th class="sort text-nowrap">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- Data will load here using ajax server side . --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // staffProfileChart({{ Js::from($staffData[0]->uid) }}, "staff-profile-attendance")
            // let uid = {{ Js::from($staffData[0]->uid) }}

            //  staff attendance Details   DataTable Start
            initServerSideDataTable('profile-attendance-table',
                "/admin/staff-profile-get-attendance?uid=" + {{ Js::from($staffData[0]->uid) }},
                'profile-attendance-selected', createColumn(StaffProfile_attendanceColumn),
                'profile-attendance-table-action')
            //  staff Details   DataTable End

            //  Staff Leave Details   DataTable Start
            initServerSideDataTable('profile-leave-table',
                "/admin/staff-profile-get-leave?uid=" + {{ Js::from($staffData[0]->uid) }},
                'profile-leave-selected', createColumn(staff_profile_leaveColumn), 'profile-leave-table-action')
            //  staff Leave Details   DataTable End

            //  Staff payment Details   DataTable Start
            initServerSideDataTable('profile-payment-table',
                "/admin/staff-profile-get-payout?uid=" + {{ Js::from($staffData[0]->uid) }},
                'profile-payment-selected', createColumn(staff_profile_paymentColumn), 'profile-payment-table-action')
            //  staff payment Details   DataTable End


            let profile_tab = localStorage.getItem('profile-tab')
            if (profile_tab != null) {
                $(".profile-tab .nav-link").removeClass('active');
                $(".profile-tab .nav-link[href='" + profile_tab + "']").addClass('active')
                $('.profile-tab-content .tab-pane').removeClass('show active');
                $('.profile-tab-content ' + profile_tab).addClass('show active');
            }
        </script>
    @endpush
@endsection
