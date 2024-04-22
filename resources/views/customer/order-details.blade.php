@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .order-details-title {
            position: relative;
            font-size: 17px;
            font-weight: bold;
            color: #000;
            overflow: hidden;
        }

        .customer-wrapper {
            margin-top: 65px;
            margin-bottom: 80px;
        }

        .thead {
            background-color: #ff5100;
            border-color: #ff5100;
            color: #fff
        }

        .table-number-head {
            color: #ff5100
        }

        .bill-detail-box tr td b {
            color: #000000;
            padding-top: 4px
        }

        .bill-detail-box tr td span {
            color: #ff5100;
            width: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bill-item {
            display: flex;
            align-items: center;
        }

        .customer-details tr th {
            color: #000
        }
    </style>
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <section class="page-title-box">
            <div class="page-title">
                <strong>Order</strong>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                @if (!session()->has('customer_id'))
                    <div class="d-flex align-items-center">
                        <a class="account-btn" href="{{ route('customer.account') }}">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="dropdown-toggle account-btn" type="button" id="acc-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="acc-dropdown">
                            <a class="dropdown-item" href="{{ route('customer.account') }}">My Account</a>
                            <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="d-flex justify-content-between align-items-center">
                                <span class="table-number-head"> <b> Table Number:</b>
                                    @php
                                        $table = json_decode($orderData[0]->selectedTable, true);
                                    @endphp
                                    {{ $table[0] }}
                                </span>
                                <span><b> Order Status:</b>
                                    @if ($orderData[0]->status == 'completed')
                                        <span class="text-success">Completed</span>
                                    @else
                                        <span class="text-info">{{ $orderData[0]->status }}</span>
                                    @endif
                                </span>
                            </h6>

                            <h5 class="order-details-title">Order Details </h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Order Id</th>
                                    <td>{{ $orderData[0]->order_id }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ showDate($orderData[0]->date) }}</td>
                                </tr>
                            </table>

                            <h5 class="order-details-title">Product Details</h5>
                            <table class="table table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                @php
                                    $product = json_decode($orderData[0]->productData, true);
                                @endphp
                                @foreach ($product as $single_product)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ getProductName($single_product['product_id']) }}</td>
                                        <td class="text-center align-middle">{{ $single_product['product_unit'] }}</td>
                                        <td class="text-center align-middle">{{ $single_product['product_qty'] }}</td>
                                        <td class="text-center align-middle">
                                            ₹{{ IND_num_format($single_product['product_price']) }}</td>
                                        <td class="text-center align-middle">
                                            @if ($single_product['order_status'] == 'Recieved')
                                                <span class='badge text-bg-primary'>Recieved</span>
                                            @elseif($single_product['order_status'] == 'Processing')
                                                <span class='badge text-bg-warning'>Processing</span>
                                            @elseif($single_product['order_status'] == 'Prepared')
                                                <span class='badge text-bg-success'>Prepared</span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <hr>

                            <h5 class="order-details-title">Order Instructions</h5>
                            <p>{{ $orderData[0]->orderInstruction }}</p>
                            <hr>
                            <h5 class="order-details-title">Your Details</h5>
                            @php
                                $customer = $orderData[0]->customer;
                            @endphp

                            @if (!is_null($customer) || count($customer) > 0)
                                <table class="table table-borderless customer-details">
                                    <tr>
                                        <th>Name</th>
                                        <td class="text-end">{{ $customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone No.</th>
                                        <td class="text-end">{{ $customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td class="text-end">{{ $customer->email }}</td>
                                    </tr>
                                </table>
                            @else
                                <div class="d-flex justify-content-center align-items-center py-3">
                                    <strong class="text-danger">Not Found</strong>
                                </div>
                            @endif
                            <hr>

                            <h5 class="order-details-title">Payment</h5>
                            @if ($orderData[0]->status == 'completed')
                                <div class="bill-detail-box">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-list-check"></i></span>
                                                    <b>Total Items</b>
                                                </div>
                                            </td>
                                            <td class="text-end">{{ $orderData[0]->total_item }} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-money-check"></i></span>
                                                    <b>Sub Total</b>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                ₹{{ IND_num_format($orderData[0]->total_amount - $orderData[0]->gst_amount) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-money-check"></i></span>
                                                    <b>Discount</b>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                ₹{{ IND_num_format($orderData[0]->discount_amount) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-money-check"></i></span>
                                                    <b>Loyalty Discount</b>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                ₹{{ IND_num_format($orderData[0]->loyalty_discount) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-receipt"></i></span>
                                                    <b>Tax</b>
                                                </div>
                                            </td>
                                            <td class="text-end">₹{{ IND_num_format($orderData[0]->gst_amount) }} </td>
                                        </tr>
                                        <tr class="grand-total">
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-indian-rupee-sign"></i></span>
                                                    <b>Grand Total</b>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                @if (!is_null($orderData[0]->grand_amount))
                                                    ₹{{ IND_num_format($orderData[0]->payable_amount) }}
                                                @else
                                                    <div class="badge text-bg-danger">Unpaid</div>
                                                    ₹{{ IND_num_format($orderData[0]->total_amount) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <a class="custom-btn"
                                    href="{{ route('customer.paymentData', $orderData[0]->order_id) }}">Payment</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('customer.modal')
    @include('customer.footer-menu')

    @push('scripts')
        <script>
            footerMenuActiveClass('order')
        </script>
    @endpush
@endsection
