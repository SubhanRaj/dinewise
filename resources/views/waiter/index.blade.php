@extends('admin.main')
@push('title')
    <title> Dashboard </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="container-fluid p-0 m-0">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Total Orders</h6>
                                        <h4 class="my-1">
                                            {{ IND_num_format(getTotalOrders()) }}
                                        </h4>
                                    </div>
                                    <div class="text-primary ms-auto font-35"><i class="fa-solid fa-burger-soda"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Incomplete Orders</h6>
                                        <h4 class="my-1">{{ IND_num_format(getIncompleteOrders()) }}</h4>
                                    </div>
                                    <div class="text-danger ms-auto font-35"><i class="fa-solid fa-burger-soda"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Completed Orders</h6>
                                        <h4 class="my-1">{{ IND_num_format(getCompletedOrders()) }}</h4>
                                    </div>
                                    <div class="text-success ms-auto font-35"><i class="fa-solid fa-burger-soda"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Total Category</h6>
                                        <h4 class="my-1">{{ getTotalCategory() }}</h4>
                                    </div>
                                    <div class="text-info ms-auto font-35"><i class="fa-solid fa-list-timeline"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Total Bookings</h6>
                                        <h4 class="my-1">{{ getTotalBookings() }}</h4>
                                    </div>
                                    <div class="text-success ms-auto font-35"><i class="fa-regular fa-user-tag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Total Products </h6>
                                        <h4 class="my-1">{{ IND_num_format(getTotalProducts()) }}</h4>
                                    </div>
                                    <div class="text-warning ms-auto font-35"><i class="fa-brands fa-product-hunt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-header pb-0 bg-warning">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-dark"> Bookings </h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <select class="form-control py-1 mb-1 font-13" id="booking-filter"
                                            style="width:120px">
                                            @php
                                                echo showMonth();
                                            @endphp
                                        </select>
                                        <button type="button" class="btn btn-dark py-1 font-13 mb-1"
                                            onclick="getBookingDataOnChange('booking-filter')">Go</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row-2-box overflow-control">
                                    <table class="table w-100 table-borderless table-hover p-0">
                                        <thead class="position-sticky top-0 table-secondary">
                                            <tr>
                                                <th class="text-center text-nowrap">Booking Id</th>
                                                <th class="text-center text-nowrap">Customer Name</th>
                                                <th class="text-center text-nowrap">Contact No.</th>
                                                <th class="text-center text-nowrap">People</th>
                                                <th class="text-center text-nowrap">Booked From</th>
                                                <th class="text-center text-nowrap">Booked To</th>
                                            </tr>
                                        </thead>
                                        <tbody id="booking-data-tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header pb-1 bg-warning">
                                <h6 class="text-dark">Tables & Their Bookings</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="row-2-box overflow-control">
                                    @php
                                        $tableData = getTableData();
                                    @endphp
                                    @if (!is_null($tableData))
                                        <table class="table w-100 table-borderless table-hover p-0">
                                            <thead class="position-sticky top-0 table-secondary">
                                                <tr>
                                                    <th class="text-center">Table No.</th>
                                                    <th class="text-center">Capacity</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tableData as $single_table)
                                                    <tr>
                                                        <td class="text-center">{{ $single_table['table_no'] }}</td>
                                                        <td class="text-center">{{ $single_table['capacity'] }}</td>
                                                        <td class="text-center">
                                                            @if ($single_table['status'] == 'available')
                                                                <span class="badge text-bg-success">Available</span>
                                                            @else
                                                                <span class="badge text-bg-danger">Un-available</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="data-not-found">
                                            <img src="{{ asset('admin-assets/assets/images/icons/not-found.webp') }}"
                                                height="100">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="card">
                            <div class="card-header pb-0 bg-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-dark"> All Orders </h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <select class="form-control py-1 mb-1 font-13" id="all-order-filter"
                                            style="width:120px">
                                            @php
                                                echo showMonth();
                                            @endphp
                                        </select>
                                        <button type="button" class="btn btn-dark py-1 font-13 mb-1"
                                            onclick="getOrderDataOnChange('all-order-filter')">Go</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row-2-box overflow-control">
                                    <table class="table w-100 table-borderless table-hover p-0">
                                        <thead class="position-sticky top-0 table-secondary">
                                            <tr>
                                                <th class="text-center text-nowrap">Order Id</th>
                                                <th class="text-center text-nowrap">Products</th>
                                                <th class="text-center text-nowrap">Status</th>
                                                <th class="text-center text-nowrap">Amount</th>
                                                <th class="text-center text-nowrap">Payment Method</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order-data-tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header pb-1 bg-info">
                                <h6 class="text-dark">Incomplete Orders</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="row-2-box overflow-control">
                                    @php
                                        $getIncompleteOrders = DB::table('orders_details')
                                            ->whereNot('status', '=', 'completed')
                                            ->get();
                                    @endphp
                                    @if (!is_null($getIncompleteOrders))
                                        <table class="table w-100 table-borderless table-hover p-0">
                                            <thead class="position-sticky top-0 table-secondary">
                                                <tr>
                                                    <th class="text-center">Order Id</th>
                                                    <th class="text-center">Products</th>
                                                    <th class="text-center">Dated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getIncompleteOrders as $single_orders)
                                                    <tr>
                                                        <td class="text-center"> {{ $single_orders->order_id }}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:;"
                                                                onclick="showProductData({{ $single_orders->id }})"
                                                                class="text-primary">View</a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ showDateTime($single_orders->created_at) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="data-not-found">
                                            <img src="{{ asset('admin-assets/assets/images/icons/not-found.webp') }}"
                                                height="100">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card position-relative">
                            <div class="card-header pb-1 bg-warning">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-dark"> Booking Overview </h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <select class="form-control py-1 mb-1 font-13" id="booking-chart"
                                            style="width:120px">
                                            @php
                                                $bookingYear = getUniqueBookingYear();
                                            @endphp
                                            @foreach ($bookingYear as $single_booking_year)
                                                <option value="{{ $single_booking_year }}">{{ $single_booking_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-dark py-1 font-13 mb-1"
                                            onclick="getBookingChartOnClick('booking-chart')">Go</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 m-0">
                                <div class="booking-overview-chart py-2 ps-1" style="height:300px">
                                    <canvas id="booking-chart-canvas"></canvas>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <h4 class="text-primary" id="booking-chart-total"></h4>
                                        <p>Total Bookings</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="text-success " id="booking-chart-non-cancelled"></h4>
                                        <p>Non-Cancelled</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="text-danger" id="booking-chart-cancelled"></h4>
                                        <p>Cancelled</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card position-relative">
                            <div class="card-header pb-1 bg-warning">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-dark"> Orders Overview </h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <select class="form-control py-1 mb-1 font-13" style="width:120px"
                                            id="order-chart">
                                            @php
                                                $orderYear = getUniqueOrderYear();
                                            @endphp
                                            @foreach ($orderYear as $single_order_year)
                                                <option value="{{ $single_order_year }}">{{ $single_order_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-dark py-1 font-13 mb-1"
                                            onclick="getOrderChartOnClick('order-chart')">Go</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 m-0">
                                <div class="order-overview-chart py-2 ps-1" style="height:300px">
                                    <canvas id="order-chart-canvas"></canvas>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <h4 class="text-primary" id="order-chart-total"></h4>
                                        <p>Total Orders</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="text-success " id="order-chart-non-completed"></h4>
                                        <p>Non-Completed</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4 class="text-danger" id="order-chart-completed"></h4>
                                        <p>Completed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


