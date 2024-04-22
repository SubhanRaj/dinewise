@extends('admin.main')
@push('title')
    <title>Order Details </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Orders</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 border-start border-0 border-4 border-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Today's Sales</h6>
                                        <h4 class="my-1">
                                            ₹{{ IND_num_format($todays_amount) }}
                                        </h4>
                                    </div>
                                    <div class="text-primary ms-auto font-35"><i class="fa-solid fa-indian-rupee-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 col-12 ">
                        <div class="card radius-10 border-start border-0 border-4 border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0 text-secondary">Total Sales</h6>
                                        <h4 class="my-1">
                                            ₹{{ IND_num_format($all_sales_amount) }}
                                        </h4>
                                    </div>
                                    <div class="text-warning ms-auto font-35"><i class="fa-solid fa-indian-rupee-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="row">
                                    <div
                                        class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                        <h6 class="text-primary" style="font-size: 16px">All Order Details</h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center" id="order-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="order-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.addOrder') }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="auto" data-bs-title="Add New"
                                                    class="btn btn-primary">New Order</i>
                                                </a>
                                                <button type="button" class="btn btn-info"
                                                    onclick="show_modal('filter-modal')">
                                                    <i class="fa-solid fa-filter"></i>
                                                </button>

                                                <a href="{{ route('admin.Trash', 'product-order-trash') }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Show Trash" class="btn btn-warning"> <i
                                                        class="fa-sharp fa-solid fa-trash-undo"></i>
                                                </a>

                                                <button type="button" class="btn btn-danger disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Move Into Trash" disabled
                                                    onclick="deleteConfirm('order-delete-all','orders_details', 'false','','')">
                                                    <i class="fa-regular fa-trash"></i>
                                                    <input type="hidden" value="" id="order-delete-all">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="order-table" class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th></th>
                                                <th class="sort text-nowrap">Order Id</th>
                                                <th class="sort text-nowrap">Product Details</th>
                                                <th class="sort text-nowrap">Tables</th>
                                                <th class="sort text-nowrap">People</th>
                                                <th class="sort text-nowrap">Customer Name</th>
                                                <th class="sort text-nowrap">Customer Mobile</th>
                                                <th class="sort text-nowrap">Payable Amount</th>
                                                <th class="sort text-nowrap">Status</th>
                                                <th class="sort text-nowrap">Coocking Status</th>
                                                <th class="sort text-nowrap">Created At</th>
                                                <th class="sort text-nowrap">Updated At</th>
                                                <th class="sort text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will load here using ajax server side --}}
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

    <!-- Modal Body -->
    <div class="modal fade" id="filter-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Filter Orders
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">From</label>
                                <input type="date" class="form-control" value="{{ $from }}" name="from"
                                    required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">To</label>
                                <input type="date" class="form-control" value="{{ $to }}" name="to"
                                    required>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.showOrderDetails') }}" class="btn btn-danger w-100">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            // order table col started

            let OrderTablesColumn = [
                "order_id",
                "productData",
                "selectedTable",
                "no_of_people",
                "customer_name",
                "customer_mobile",
                "payable_amount",
                "status",
                "chef_status",
            ];


            let queryParams = getQueryParams();
            let searchParams = queryParams[1];
            if (queryParams == 0) {
                $('#order-table').DataTable().clear().destroy();
                initServerSideDataTable('order-table', '/admin/view-order-details', 'order-selected',
                    createColumn(OrderTablesColumn),
                    'order-table-action')
            } else {
                $('#order-table').DataTable().clear().destroy();
                let fetchurl = `/admin/view-order-details` + searchParams

                initServerSideDataTable('order-table', fetchurl, 'order-selected',
                    createColumn(OrderTablesColumn),
                    'order-table-action')

            }
        </script>
    @endpush
@endsection
