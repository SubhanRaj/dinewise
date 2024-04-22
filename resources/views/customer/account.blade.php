@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .login-form-box {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .account-details {
            margin-top: 75px;
        }

        .account-icon {
            color: #ff5100
        }

        .title {
            font-size: 18px;
        }

        .edit-button {
            border: none;
            outline: none;
            background-color: transparent;
            color: #ff5100
        }

        .dropdown-toggle::after {
            display: none;
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d8d8d8;
            border-radius: 5px;
            outline-color: #ff5100
        }

        .loyalty-points-head {
            font-weight: bold;
            font-style: italic;
            color: #ff5100;
            text-align: center;
            padding-top: 20px;
        }
    </style>
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <section class="page-title-box">
            <div class="page-title">
                <strong>My Account</strong>
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
                @if (!session()->has('customer_id'))
                    <div class="col-12">
                        <div class="login-form-box">
                            <div class="card w-100">
                                <div class="card-body">

                                    <div class="login-form">
                                        <form method="POST" id="login-form"
                                            onsubmit="uploadData1('login-form','{{ route('customer.signIn') }}','acc-login-alert','acc-login-btn', event)">
                                            @csrf

                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('assets/authenticity.png') }}" height="80">
                                            </div>

                                            <h4 class="welcome-title">Sign In To Access Your Account !</h4>
                                            <div id="acc-login-alert"></div>
                                            <div class="input-group mb-3 mt-2">
                                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                                <input type="text" class="form-control" name="phone_number"
                                                    placeholder="Signin with phone number">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="custom-btn" id="acc-login-btn">Sign
                                                    In</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @php
                        $customer_id = session()->get('customer_id');
                        $customer_data = DB::table('customers')->where('id', '=', $customer_id)->first();
                    @endphp
                    <div class="col-12">
                        <div class="account-details">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless customer-details">
                                        <tr>
                                            <th colspan="2" class="title"> Your Details
                                                <button type="button" onclick="show_modal('edit-account-details')"
                                                    class="edit-button">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><span class="account-icon"><i class="fa-solid fa-user"></i></span> Name</th>
                                            <td class="text-end">{{ $customer_data->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap"><span class="account-icon"><i
                                                        class="fa-solid fa-phone"></i></span> Phone
                                                No.</th>
                                            <td class="text-end">{{ $customer_data->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th><span class="account-icon"><i class="fa-solid fa-envelope"></i></span> Email
                                            </th>
                                            <td class="text-end">{{ $customer_data->email }}</td>
                                        </tr>
                                        <tr>
                                            <th><span class="account-icon"><i class="fa-solid fa-calendar-days"></i></span>
                                                DOB
                                            </th>
                                            <td class="text-end">
                                                {{ !is_null($customer_data->dob) ? showDate($customer_data->dob) : '---' }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="5" class="title">Order Details</th>
                                            </tr>
                                            <tr>
                                                <th>Order</th>
                                                <th>Table</th>
                                                <th>Payment</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $orderDetails = DB::table('orders_details')
                                                    ->where('customer_id_or_booking_id', '=', $customer_id)
                                                    ->get();
                                            @endphp
                                            @if (count($orderDetails) > 0)
                                                @foreach ($orderDetails as $single_order)
                                                    @php
                                                        $table_no = json_decode($single_order->selectedTable, true);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $single_order->order_id }}</td>
                                                        <td>{{ $table_no[0] }}</td>
                                                        <td>
                                                            @if (!is_null($single_order->grand_amount))
                                                                <span class="badge text-bg-success">Paid</span>
                                                            @else
                                                                <span class="badge text-bg-danger">Unpaid</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            {{ showDate($single_order->created_at) }}
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('customer.orderDetails', $single_order->order_id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th colspan="5"><span class="text-danger">You don't have any order
                                                            yet.</span></th>

                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mb-5">

                        {{-- get loyalty points  --}}

                        @php
                            $loyalty_points = DB::table('customer_loyalty_points')
                                ->where('customer_id', $customer_id)
                                ->get();
                        @endphp

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('admin-assets/assets/images/icons/coin.png') }}" alt="">
                                </div>
                                <h5 class="loyalty-points-head">Loyalty Points :
                                    {{ count($loyalty_points) > 0 ? $loyalty_points[0]->points : 0 }}</h5>
                            </div>
                        </div>
                    </div>



                    {{-- edit customer data modal  --}}
                    <div class="modal fade" id="edit-account-details" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="fw-bold pt-3 pb-1 font-24">Your Details</h3>
                                                <form method="POST" id="edit-customer-form"
                                                    onsubmit="uploadData1('edit-customer-form','{{ route('customer.updateCustomerData', $customer_data->id) }}','cust-edit-alert','cust-edit-alert-btn',event)">
                                                    @csrf
                                                    <div id="cust-edit-alert"></div>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-0 text-dark">Name</label>
                                                        <input type="text" class="input" name="name"
                                                            placeholder="Name" value="{{ $customer_data->name }}"
                                                            required>
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label class="form-label mb-0 text-dark">Phone No.</label>
                                                        <input type="number" class="input" name="phone"
                                                            placeholder="Phone Number"
                                                            value="{{ $customer_data->phone }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-0 text-dark">Email</label>
                                                        <input type="email" class="input" name="email"
                                                            placeholder="Email Address"
                                                            value="{{ $customer_data->email }}" required>
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <label class="form-label mb-0 text-dark">Date Of Birth</label>
                                                        <input type="date" class="input"
                                                            value="{{ $customer_data->dob }}" name="dob" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" id="cust-edit-alert-btn"
                                                            class="custom-btn">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
    @include('customer.footer-menu')
@endsection
