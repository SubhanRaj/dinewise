@extends('staff.main')
@push('title')
    <title> Profile</title>
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
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Profile</li>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="border rounded w-100 h-100 p-2 pt-3">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-center align-items-center staff-profile-img">
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
                            <div class="card-body overflow-control">
                                @php
                                    $getStaffAccountDetails = DB::table('staff_account_details')
                                        ->where('uid', '=', $staffData[0]->uid)
                                        ->get();
                                @endphp
                                @if (count($getStaffAccountDetails) != 0)
                                    <table class="table table-borderless table-striped table-responsive">
                                        <tr>
                                            <th>Bank Name</th>
                                            <td>{{ $getStaffAccountDetails[0]->bank_name }}</td>

                                            <th>Account Holder Name</th>
                                            <td>{{ $getStaffAccountDetails[0]->account_holder_name }}</td>
                                        </tr>

                                        <tr>
                                            <th>Account Number</th>
                                            <td>{{ $getStaffAccountDetails[0]->acc_no }}</td>

                                            <th>IFSC Code</th>
                                            <td>{{ $getStaffAccountDetails[0]->ifsc_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{ $getStaffAccountDetails[0]->phone_number }}</td>

                                            <th>Google Pay</th>
                                            <td>{{ $getStaffAccountDetails[0]->gpay }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Pay</th>
                                            <td>{{ $getStaffAccountDetails[0]->phonepay }}</td>

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

                                                <th>Current Salary</th>
                                                <td>{{ IND_num_format($SalaryData[0]->current_salary) }}</td>

                                            </tr>
                                        @endif


                                    </table>
                                @else
                                    <h4 class="text-center p-3">Data Not Found</h4>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script></script>
    @endpush
@endsection
