@extends('staff.main')
@push('title')
    <title> Account Details </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Staff</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Account Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="row">
                                    <div
                                        class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                        <h6 class="text-primary" style="font-size: 16px"> Account Details</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    @if (count($data) != 0)
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <th>Bank Name</th>
                                                <td>{{ $data[0]->bank_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Holder Name</th>
                                                <td>{{ $data[0]->account_holder_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Number</th>
                                                <td>{{ $data[0]->acc_no }}</td>
                                            </tr>
                                            <tr>
                                                <th>IFSC Code</th>
                                                <td>{{ $data[0]->ifsc_code }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $data[0]->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Google Pay Number</th>
                                                <td>{{ $data[0]->gpay }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Pay Number</th>
                                                <td>{{ $data[0]->phonepay }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pay Tim Number</th>
                                                <td>{{ $data[0]->paytm }}</td>
                                            </tr>
                                        </table>
                                    @else
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-white">Data Not Found</h6>
                                                    <div class="text-white">It seems your account details not added yet !
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
