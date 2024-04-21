@extends('admin.main')
@push('title')
    <title>Customer Profile</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Profile</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-user text-primary"></i> Name </td>
                                        <td>{{ $customer_data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-phone text-primary"></i> Phone </td>
                                        <td>{{ $customer_data->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-envelope text-primary"></i> Email </td>
                                        <td>{{ $customer_data->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-calendar-days text-primary"></i> DOB </td>
                                        <td>{{ $customer_data->dob }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card radius-10 border-start border-0 border-4 border-primary">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 text-secondary">Total Orders</h6>
                                                <h4 class="my-1">
                                                    {{ count($order_details) }}
                                                </h4>
                                            </div>
                                            <div class="text-primary ms-auto font-35">
                                                <i class="fa-solid fa-burger-soda"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card radius-10 border-start border-0 border-4 border-success">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 text-secondary">Order Amount</h6>
                                                <h4 class="my-1">
                                                    ₹{{ IND_num_format($total_order_amount) }}
                                                </h4>
                                            </div>
                                            <div class="text-success ms-auto font-35">
                                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card radius-10 border-start border-0 border-4 border-warning">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 text-secondary">Loyalty Points</h6>
                                                <h4 class="my-1">
                                                    @if (count($loyalty_points) > 0)
                                                        {{ IND_num_format($loyalty_points[0]->points) }}
                                                    @else
                                                        0
                                                    @endif
                                                </h4>
                                            </div>
                                            <div class="text-warning ms-auto font-35">
                                                <i class="fa-solid fa-coins"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-primary">Order Details</h5>
                            </div>
                            <div class="card-body">
                                <table class="table w-100 table-borderless table-hover p-0">
                                    <thead class="position-sticky top-0 table-secondary">
                                        <tr>
                                            <th class="text-center text-nowrap">Order Id</th>
                                            <th class="text-center text-nowrap">Products</th>
                                            <th class="text-center text-nowrap">Status</th>
                                            <th class="text-center text-nowrap">Amount</th>
                                            <th class="text-center text-nowrap">Payment Status</th>
                                            <th class="text-center text-nowrap">Payment Method</th>
                                            <th class="text-center text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order_details as $single_order)
                                            <tr>
                                                <td class="text-center">{{ $single_order->order_id }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:;" class="text-primary"
                                                        onclick="showProductData({{ $single_order->id }})">View</a>
                                                </td>
                                                <td class="text-center">{{ $single_order->status }}</td>
                                                <td class="text-center">
                                                    ₹{{ IND_num_format($single_order->total_amount + $single_order->gst_amount) }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($single_order->payment_status == 'done')
                                                        <span class="badge text-bg-success">Paid</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td class="text-center text-capitalize">{{ $single_order->payment_method }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('admin.orderDetails', $single_order->order_id) }}"
                                                        class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>No order found.</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
