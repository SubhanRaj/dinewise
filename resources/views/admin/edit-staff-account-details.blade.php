@extends('admin.main')
@push('title')
    <title>Edit Staff Account Details </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Payout</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Account Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="pt-2 text-primary">Edit Account Details</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('admin.updateAccountDetailsIndex', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Select Staff <span
                                                    class="text-danger">*</span></label>
                                            <select name="staff" id="example-search" class="form-select">
                                                @php
                                                    $staffData = getStaffDetailsUsingUid($data[0]->uid);
                                                @endphp
                                                <option value="{{ $data[0]->uid }}">{{ $staffData[0]->name }}</option>
                                                @php
                                                    echo getAllStaff();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="staff"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bank_name" required
                                                placeholder="Bank Name" value="{{ $data[0]->bank_name }}">
                                            <p class="form-feedback invalid-feedback" data-name="bank_name"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Account Holder Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="account_holder_name" required
                                                placeholder="Account Holder" value="{{ $data[0]->account_holder_name }}">
                                            <p class="form-feedback invalid-feedback" data-name="account_holder_name"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Account Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="account_number" required
                                                placeholder="Account Number" value="{{ $data[0]->acc_no }}">
                                            <p class="form-feedback invalid-feedback" data-name="account_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ifsc_code" required
                                                placeholder="IFSC Code" value="{{ $data[0]->ifsc_code }}">
                                            <p class="form-feedback invalid-feedback" data-name="ifsc_code"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone_number" required
                                                placeholder="Phone Number " value="{{ $data[0]->phone_number }}">
                                            <p class="form-feedback invalid-feedback" data-name="phone_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Google Pay Number </label>
                                            <input type="number" class="form-control" name="gpay_number"
                                                placeholder="Google Pay Number " value="{{ $data[0]->gpay }}">
                                            <p class="form-feedback invalid-feedback" data-name="gpay_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Phone Pay Number </label>
                                            <input type="number" class="form-control" name="phone_pay_number"
                                                placeholder="Phone Pay Number " value="{{ $data[0]->phonepay }}">
                                            <p class="form-feedback invalid-feedback" data-name="phone_pay_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">PayTm Number </label>
                                            <input type="number" class="form-control" name="paytm_number"
                                                placeholder="PayTm Number " value="{{ $data[0]->paytm }}">
                                            <p class="form-feedback invalid-feedback" data-name="paytm_number"></p>
                                        </div>


                                        <div class="col-12 mb-3 d-flex justify-content-center align-items-center pt-4">
                                            <div id="btn-box" style="width: 200px">
                                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            dselect(document.querySelector('.form-select'), {
                search: true
            })
        </script>
    @endpush
@endsection
