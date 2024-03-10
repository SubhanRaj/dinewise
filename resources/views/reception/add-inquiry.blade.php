@extends('reception.main')
@push('title')
    <title> Add Inquiry </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Inquiry</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Inquiry</li>
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
                                <h6 class="pt-2 text-primary">Add New Inquiry</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('reception.saveInquiry') }}', 'alert-box1', 'btn-box', event)">

                                    @csrf
                                    <div class="row">

                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/answer.png') }}"
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
                                            <label class="form-label">Source <span class="text-danger">*</span></label>
                                            <select class="form-select" name="source" required>
                                                <option value="">Select source</option>
                                                <option value="Online">Online</option>
                                                <option value="Offline">Offline</option>
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="source"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="client_name" required
                                                placeholder="Client Name">
                                            <p class="form-feedback invalid-feedback" data-name="client_name"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Requirement <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="requirement" required
                                                placeholder="Requirement">
                                            <p class="form-feedback invalid-feedback" data-name="requirement"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email </label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                            <p class="form-feedback invalid-feedback" data-name="email"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" required
                                                placeholder="Phone Number">
                                            <p class="form-feedback invalid-feedback" data-name="phone"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Whatsapp Number </label>
                                            <input type="number" class="form-control" name="whatsapp_number"
                                                placeholder="Whatsapp Number">
                                            <p class="form-feedback invalid-feedback" data-name="whatsapp_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Address">
                                            <p class="form-feedback invalid-feedback" data-name="address"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Business <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="business"
                                                placeholder="Business" required>
                                            <p class="form-feedback invalid-feedback" data-name="business"></p>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Website Url</label>
                                            <input type="text" class="form-control" name="website_url"
                                                placeholder="Website Url">
                                            <p class="form-feedback invalid-feedback" data-name="website_url"></p>
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
