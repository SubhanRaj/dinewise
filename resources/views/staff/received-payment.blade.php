@extends('staff.main')
@push('title')
    <title> Received Payment Details </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Payout</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Received Payment </li>
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
                                        <h6 class="text-primary" style="font-size: 16px"> Received Payment Details</h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center"
                                            id="staff-panel-released-payment-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="staff-panel-released-payment-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="staff-panel-released-payment-table"
                                        class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th class="sort text-nowrap">Paid Amount</th>
                                                <th class="sort text-nowrap">Rest Amount</th>
                                                <th class="sort text-nowrap">Method</th>
                                                <th class="sort text-nowrap">Transaction Id</th>
                                                <th class="sort text-nowrap">Date & Time</th>
                                                <th class="sort text-nowrap">Created At</th>
                                                <th class="sort text-nowrap">Updated At</th>
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
