@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .bill-details {
            margin-top: 65px;
            margin-bottom: 80px;
        }

        .bill-details-title {
            font-size: 17px;
            color: #000
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

        .grand-total td {
            font-size: 15px;
            font-weight: bold
        }

        .customer-details-title {
            font-size: 18px;
            font-weight: bold;
            color: #000
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 5px;
            outline-color: #ff5100
        }

        .login-or-box {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: 30px 0;
        }

        .login-or {
            background-color: #fff;
        }

        .login-or::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border: 1px solid #f2f2f2;
            width: 100%;
            left: 0;
        }

        .login-or-text {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            margin-top: 1px;
            z-index: 1;
            background-color: #fff;
            padding: 0 3px;
        }
    </style>
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <section class="page-title-box">
            <div class="page-title">
                <strong>Payment</strong>
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
                    <div class="bill-details">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h5 class="bill-details-title fw-bold">Bill Details</h5> --}}
                                <div class="bill-detail-box">
                                    {{-- <table class="table table-borderless">
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-list-check"></i></span>
                                                    <b>Total Items</b>
                                                </div>
                                            </td>
                                            <td class="text-end" id="bill-total-item"> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-money-check"></i></span>
                                                    <b>Sub Total</b>
                                                </div>
                                            </td>
                                            <td class="text-end" id="bill-sub-total"> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-receipt"></i></span>
                                                    <b>Tax</b>
                                                </div>
                                            </td>
                                            <td class="text-end" id="bill-tax"> </td>
                                        </tr>
                                        <tr class="grand-total">
                                            <td>
                                                <div class="bill-item">
                                                    <span> <i class="fa-solid fa-indian-rupee-sign"></i></span>
                                                    <b>Grand Total</b>
                                                </div>
                                            </td>
                                            <td class="text-end" id="bill-grand-total"> </td>
                                        </tr>

                                    </table> --}}

                                    {{-- <hr> --}}

                                    @if (!session()->has('customer_id'))
                                        <div class="customer-details-box">
                                            <div class="customer-form">
                                                <h5 class="customer-details-title">Customer's Details</h5>
                                                <form method="POST" class="mt-2" id="customer-details">
                                                    @csrf

                                                    <input type="hidden" name="no_of_people" value="1">
                                                    <input type="hidden" name="table_no" value="">

                                                    <div class="mb-3">
                                                        <input type="text" name="name" class="input" required
                                                            placeholder="Enter your name*">
                                                        <p class="form-feedback invalid-feedback" data-name="name"></p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="number" name="phone" class="input" required
                                                            placeholder="Enter your phone number*">
                                                        <p class="form-feedback invalid-feedback" data-name="phone_number">
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="email" name="email" class="input"
                                                            placeholder="Enter your email address">
                                                        <p class="form-feedback invalid-feedback" data-name="email"></p>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="login-or-box">
                                                <span class="login-or"></span>
                                                <span class="login-or-text">OR</span>
                                            </div>
                                            <div class="login-box">

                                                <div class="button-box d-flex justify-content-center">
                                                    <button type="button" onclick="show_modal('login-modal')"
                                                        class="custom-btn bg-dark w-50">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="customer-details-box">
                                            <h5 class="customer-details-title">Customer's Details</h5>
                                            <div class="customer-form" id="customer-details">
                                                @php
                                                    $customer_id = session()->get('customer_id');
                                                    $customer_data = DB::table('customers')
                                                        ->where('id', '=', $customer_id)
                                                        ->first();
                                                @endphp
                                                <input type="hidden" name="no_of_people" value="1">
                                                <input type="hidden" name="name" value="{{ $customer_data->name }}">
                                                <input type="hidden" name="phone" value="{{ $customer_data->phone }}">
                                                <input type="hidden" name="email" value="{{ $customer_data->email }}">
                                                <table class="table table-borderless customer-details">
                                                    <tr>
                                                        <th> Name</th>
                                                        <td class="text-end">{{ $customer_data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap"> Phone
                                                            No.</th>
                                                        <td class="text-end">{{ $customer_data->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Email
                                                        </th>
                                                        <td class="text-end">{{ $customer_data->email }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                    <strong class="text-dark">Order Instructions</strong>
                                    <textarea id="order_instruction" class="form-control" placeholder="Order Instructions...."></textarea>
                                    <hr>
                                    <strong class="text-dark">Terms & Conditions</strong>
                                    <div class="d-flex">
                                        {{-- <div>
                                            <input type="checkbox" onchange="termConditionsCheckbox(event)" class="form-check-input">
                                        </div> --}}
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                            maxime
                                            suscipit repellendus doloremque tempore voluptas laborum! Maiores sint totam
                                            magni?</p>
                                    </div>
                                    <div id="place-order-btn">
                                        <button class="custom-btn" type="button" onclick="placeOrder()">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
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
            showAmountDetails()
        </script>
    @endpush
@endsection
