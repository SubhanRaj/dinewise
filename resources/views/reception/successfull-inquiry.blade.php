@extends('reception.main')
@push('title')
    <title>Successfull Inquiry Details </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Inquiry</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Successfull Inquiry Details</li>
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
                                        <h6 class="text-primary" style="font-size: 16px"> All Successfull Inquiry Details
                                        </h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center"
                                            id="Successfull-inquiry-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="Successfull-inquiry-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('reception.exportSuccessfullInquiryData') }}"
                                                    class="btn btn-success">
                                                    <i class="fas fa-file-excel"></i>
                                                </a>

                                                <button type="button" class="btn btn-primary disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto" data-bs-title="Remove"
                                                    disabled
                                                    onclick="removeSuccessfullInquiry('Successfull-inquiry-remove-all')"><i
                                                        class="fas fa-arrow-right"></i>
                                                    <input type="hidden" value=""
                                                        id="Successfull-inquiry-remove-all">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="Successfull-inquiry-table"
                                        class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th></th>
                                                <th class="sort text-nowrap">Client Name</th>
                                                <th class="sort text-nowrap">Requirement</th>
                                                <th class="sort text-nowrap">Email </th>
                                                <th class="sort text-nowrap">Phone Number </th>
                                                <th class="sort text-nowrap">Whatsapp Number </th>
                                                <th class="sort text-nowrap">Address </th>
                                                <th class="sort text-nowrap">Business </th>
                                                <th class="sort text-nowrap">Website </th>
                                                <th class="sort text-nowrap">Source </th>
                                                <th class="sort text-nowrap">Year </th>
                                                <th class="sort text-nowrap">Month </th>
                                                <th class="sort text-nowrap">Date </th>
                                                <th class="sort text-nowrap">Service Taken </th>
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
        </div>

    </div>
@endsection
