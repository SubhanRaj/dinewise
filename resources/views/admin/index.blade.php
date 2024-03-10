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
                    <div class="col-lg-3 col-md-6 col-12 ">
                        <a href="{{ route('admin.showOrderDetails') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-primary">
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
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showOrderDetails') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-danger">
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
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showOrderDetails') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-success">
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
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showCategory') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-info">
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
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showBooking') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-success">
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
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showProducts') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-warning">
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
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.getCustomersData') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0 text-secondary">Total Customers </h6>
                                            <h4 class="my-1">{{ IND_num_format(getTotalCustomer()) }}</h4>
                                        </div>
                                        <div class="text-info ms-auto font-35"><i class="fa-regular fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('admin.showOrderDetails') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0 text-secondary">Total Visitor </h6>
                                            <h4 class="my-1">{{ IND_num_format(totalVisitor()) }}</h4>
                                        </div>
                                        <div class="text-primary ms-auto font-35"><i class="fa-duotone fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-blues">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">New Category</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-primary text-white ms-auto">
                                        <a href="{{ route('admin.addCategoryIndex') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-blooker">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">New Product</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-warning text-white ms-auto">
                                        <a href="{{ route('admin.addProducts') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-lush">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">New Table</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-success text-white ms-auto">
                                        <a href="{{ route('admin.addTableIndex') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-scooter">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">New Order</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-info text-white ms-auto">
                                        <a href="{{ route('admin.addOrder') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="dash-table-block-box">
                            @php
                                $Tables = getAllTable();
                            @endphp

                            @foreach ($Tables as $single_table_block)
                                @if ($single_table_block['status'] == 'unavailable')
                                    <div class="table-block shadow bg-gradient-bloody cursor-pointer position-relative">
                                        <span>{{ $single_table_block['table_no'] }} </span>

                                        {{-- cooking status dropdown  --}}

                                        <div class='dropdown action-dropdown position-absolute'
                                            style="top: 5px;right:10px">
                                            <a href="javascript:;" class='dropdown-toggle p-0' data-bs-toggle='dropdown'>
                                                <span class='fas fa-ellipsis-h fs--1 text-dark'></span>
                                            </a>
                                            <div class='dropdown-menu border py-2'>
                                                <a class='dropdown-item'
                                                href='{{ route('admin.orderDetails', $single_table_block['order_id']) }}'><i
                                                    class='fas fa-eye text-primary'></i> View</a>
                                                <a class='dropdown-item' href='javascript:;'
                                                    onclick="editOrder('{{ $single_table_block['order_id'] }}','{{ route('admin.addOrder') }}')"><i
                                                        class='fas fa-edit text-primary'></i> Edit</a>
                                                <p class='dropdown-item my-0' href='javascript:;'> Order Id :
                                                    {{ $single_table_block['order_id'] }}
                                                </p>
                                                @php
                                                    $orderChefStatus = DB::table('orders_details')
                                                        ->where('order_id', '=', $single_table_block['order_id'])
                                                        ->first();
                                                @endphp

                                                <p class='dropdown-item my-0' href='javascript:;'> Coocking Status :
                                                    @if ($orderChefStatus->chef_status == 'PREPARED')
                                                        <strong class="badge text-bg-success p-2 font-13">
                                                            PREPARED</strong>
                                                    @elseif ($orderChefStatus->chef_status == 'RECEIVED')
                                                        <strong class="badge text-bg-primary p-2 font-13">RECEIVED</strong>
                                                    @elseif ($orderChefStatus->chef_status == 'PREPARING')
                                                        <strong class="badge text-bg-info p-2 font-13">PREPARING</strong>
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-block shadow bg-gradient-lush cursor-pointer"
                                        onclick="selectTableFromDashboard('{{ $single_table_block['table_no'] }}' , '{{ route('admin.addOrder') }}')">
                                        <span>{{ $single_table_block['table_no'] }}</span>
                                    </div>
                                @endif
                            @endforeach

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
                                            onclick="getBookingDataOnChange('booking-filter')"><i
                                                class="fa-regular fa-magnifying-glass"></i></button>
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
                                                @foreach ($tableData as $single_table_block)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="table-box-design">
                                                                <span>
                                                                    {{ $single_table_block['table_no'] }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $single_table_block['capacity'] }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            @if ($single_table_block['status'] == 'available')
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
                                            onclick="getOrderDataOnChange('all-order-filter')"><i
                                                class="fa-regular fa-magnifying-glass"></i></button>
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
                                                        <td class="text-center"> <a href="javascript:;"
                                                                onclick="editOrder('{{ $single_orders->order_id }}','{{ route('admin.addOrder') }}')">{{ $single_orders->order_id }}</a>
                                                        </td>
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
                                            onclick="getBookingChartOnClick('booking-chart')">
                                            <i class="fa-regular fa-magnifying-glass"></i>
                                        </button>
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
                                            onclick="getOrderChartOnClick('order-chart')"><i
                                                class="fa-regular fa-magnifying-glass"></i></button>
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

    @push('scripts')
        <script src="{{ asset('admin-assets/assets/plugins/chartjs/js/custom-cart.js') }}"></script>
    @endpush
@endsection
