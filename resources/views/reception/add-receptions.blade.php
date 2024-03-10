@extends('reception.main')
@push('title')
    <title> Add Log </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Reception</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Log</li>
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
                                <h6 class="pt-2 text-primary">Add New Log</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('reception.saveReception') }}', 'alert-box1', 'btn-box', event)">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/computer.png') }}"
                                                alt="">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Year (YYYY) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control yearpicker" name="year" required
                                                placeholder="YYYY" readonly>
                                            <p class="form-feedback invalid-feedback" data-name="year"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month <span class="text-danger">*</span></label>
                                            <select name="month" class="form-select">
                                                <option value="">Select Month</option>
                                                @php
                                                    echo showMonth();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="month"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required
                                                placeholder="Date">
                                            <p class="form-feedback invalid-feedback" data-name="date"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Visitor Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="visitor_name" required
                                                placeholder="Visitor Name">
                                            <p class="form-feedback invalid-feedback" data-name="visitor_name"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" required
                                                placeholder="Phone Number">
                                            <p class="form-feedback invalid-feedback" data-name="phone"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Purpose <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="purpose" required
                                                placeholder="Purpose">
                                            <p class="form-feedback invalid-feedback" data-name="purpose"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Entry Time <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="entry_time" required
                                                placeholder="Entry Time">
                                            <p class="form-feedback invalid-feedback" data-name="entry_time"></p>
                                        </div>
                                        {{-- <div class="col-lg-6 mb-3">
                                            <label class="form-label">Exit Time </label>
                                            <input type="time" class="form-control" name="exit_time"
                                                placeholder="Exit Time">
                                            <p class="form-feedback invalid-feedback" data-name="exit_time"></p>
                                        </div> --}}

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
