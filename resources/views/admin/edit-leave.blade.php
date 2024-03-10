@extends('admin.main')
@push('title')
    <title> Edit Leave </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Leave</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Leave</li>
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
                                <h6 class="pt-2 text-primary">Edit Leave</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('admin.updateLeave', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">

                                    @csrf
                                    <div class="row">

                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/exit.png') }}"
                                                alt="">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Year (YYYY) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control yearpicker" name="year" required
                                                placeholder="YYYY" readonly value="{{ $data[0]->year }}">
                                            <p class="form-feedback invalid-feedback" data-name="year"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month <span class="text-danger">*</span></label>
                                            <select name="month" class="form-select">
                                                <option value="{{ $data[0]->month }}">{{ $data[0]->month }}</option>
                                                @php
                                                    echo showMonth();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="month"></p>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required
                                                placeholder="Date" value="{{ $data[0]->date }}">
                                            <p class="form-feedback invalid-feedback" data-name="date"></p>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Select Staff <span
                                                    class="text-danger">*</span></label>
                                            <select name="staff" id="example-search" class="form-select" required>
                                                <option value="{{ $data[0]->uid }}">
                                                    @php
                                                        $staffData = getStaffDetailsUsingUid($data[0]->uid);
                                                    @endphp
                                                    {{ $staffData[0]->name }}
                                                </option>
                                                @php
                                                    echo getAllStaff();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="staff"></p>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">From <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="leave_from" required
                                                value="{{ $data[0]->l_from }}">
                                            <p class="form-feedback invalid-feedback" data-name="leave_from"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">To <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="leave_to" required
                                                value="{{ $data[0]->l_to }}">
                                            <p class="form-feedback invalid-feedback" data-name="leave_to"></p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Leave Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="description" rows="5" class="form-control" required placeholder="Work Description">{{ $data[0]->des }}</textarea>
                                            <p class="form-feedback invalid-feedback" data-name="description"></p>
                                        </div>

                                        @if ($data[0]->type == 'REQUEST')
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <div>
                                                    @php
                                                        $approve = $data[0]->status == 'Approved' ? 'checked' : '';
                                                        $denied = $data[0]->status == 'Denied' ? 'checked' : '';
                                                        $pending = $data[0]->status == 'Pending' ? 'checked' : '';
                                                    @endphp
                                                    <label class='m-2'>
                                                        <input type="radio" name="status" value="Approved"
                                                            class="form-check-input status-input" {{ $approve }}>
                                                        Approved
                                                    </label>

                                                    <label class='m-2'>
                                                        <input type="radio" name="status" value="Denied"
                                                            class="form-check-input status-input" {{ $denied }}
                                                            id="denied">
                                                        Denied
                                                    </label>

                                                    <label class='m-2'>
                                                        <input type="radio" name="status" value="Pending"
                                                            class="form-check-input status-input" {{ $pending }}>
                                                        Pending
                                                    </label>
                                                </div>
                                                <p class="form-feedback
                                                            invalid-feedback"
                                                    data-name="status"></p>
                                            </div>

                                            <div class="col-12 mb-3  {{ $data[0]->status == 'Denied' ? 'd-block' : 'd-none' }}"
                                                id="reason-box">
                                                <label class="form-label">Reason</label>
                                                <textarea name="reason" class="form-control" id="reason-text" rows="3" placeholder="Reason">{{ $data[0]->reject_reason }}</textarea>
                                            </div>
                                        @endif

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

            $('.yearpicker').yearpicker({
                year: {{ $data[0]->year }}
            })
        </script>
    @endpush
@endsection
