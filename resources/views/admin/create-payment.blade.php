@extends('admin.main')
@push('title')
    <title> Create Payment </title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Create Payment</li>
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
                                <h6 class="pt-2 text-primary">Create Payment</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('admin.saveCreatePayment') }}', 'alert-box1', 'btn-box', event)">
                                    @csrf
                                    <div class="row">
                                        {{-- current salary hidden input  --}}
                                        <input type="hidden" id="current-salary" value="0">
                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/bank.png') }}"
                                                alt="">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Select Staff </label>
                                            <select name="staff" id="select-staff" class="form-select">
                                                <option value="">Select Staff</option>
                                                @php
                                                    echo getAllStaff();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="staff"></p>
                                        </div>


                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Year (YYYY)</label>
                                            <input type="text" class="form-control yearpicker" id="select-year"
                                                name="year" required placeholder="YYYY" readonly>
                                            <p class="form-feedback invalid-feedback" data-name="year"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month</label>
                                            <select name="month" class="form-select"
                                                onchange="getStaffLeaveAdvanceCurrent(this.value,'staff-details','select-staff','select-year','select-month')"
                                                id="select-month">
                                                <option value="">Select Month</option>
                                                @php
                                                    echo showMonth();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="month"></p>
                                        </div>

                                        <div class="col-12 mb-3" id="staff-details">

                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Deduction</label>
                                            <input type="number" name="deduction" class="form-control"
                                                placeholder="Deduction" value="0" id="deduction"
                                                onkeyup="salaryCalculation('current-salary', 'deduction', 'bonus', 'final-amount')">
                                            <p class="form-feedback invalid-feedback" data-name="deduction"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Bonus</label>
                                            <input type="number" name="bonus" class="form-control" placeholder="Bonus"
                                                value="0" id="bonus"
                                                onkeyup="salaryCalculation('current-salary', 'deduction', 'bonus', 'final-amount')">
                                            <p class="form-feedback invalid-feedback" data-name="bonus"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Final Amount</label>
                                            <input type="number" name="final_amount" class="form-control"
                                                placeholder="Final Amount" required id="final-amount">
                                            <p class="form-feedback invalid-feedback" data-name="final_amount"></p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Comment</label>
                                            <textarea name="comment" rows="3" class="form-control" required placeholder="Comment"></textarea>
                                            <p class="form-feedback invalid-feedback" data-name="comment"></p>
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
            $.each($('.form-select'), function() {
                dselect((this), {
                    search: true
                })
            });

            $('.yearpicker').yearpicker()
        </script>
    @endpush
@endsection
