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
                <strong>Billing</strong>
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
                            <h5 class="fw-bold table-number-head">Table Number :
                                @php
                                    $table = json_decode($orderData[0]->selectedTable, true);
                                @endphp
                                {{ $table[0] }}
                            </h5>

                            <h5 class="order-details-title">Amount Details</h5>
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
                                            ₹{{ IND_num_format($orderData[0]->total_amount) }}
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
                                                ₹{{ IND_num_format($orderData[0]->grand_amount) }}
                                            @else
                                                <div class="badge text-bg-danger">Unpaid</div>
                                                ₹{{ IND_num_format($orderData[0]->total_amount + $orderData[0]->gst_amount) }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            @if ($orderData[0]->payment_status != 'done')
                                <h5 class="order-details-title">Payment Method</h5>
                                <div class="list-group mb-3">
                                    @php
                                        $cash = $orderData[0]->payment_method == 'cash' ? 'checked' : '';
                                        $card = $orderData[0]->payment_method == 'card' ? 'checked' : '';
                                        $qrCode = $orderData[0]->payment_method == 'qr-code' ? 'checked' : '';
                                    @endphp
                                    <label class="list-group-item border-0">
                                        <input class="form-check-input me-1 payment-checkbox" name="payment_method"
                                            onclick="showQrCode(this.value)" type="radio" value="cash"
                                            {{ $cash }} />
                                        Cash
                                    </label>
                                    <label class="list-group-item border-0">
                                        <input class="form-check-input me-1 payment-checkbox" name="payment_method"
                                            onclick="showQrCode(this.value)" type="radio" value="card"
                                            {{ $card }} />
                                        Card
                                    </label>
                                    <label class="list-group-item border-0">
                                        <input class="form-check-input me-1 payment-checkbox" name="payment_method"
                                            onclick="showQrCode(this.value)" type="radio" value="qr-code"
                                            {{ $qrCode }} />
                                        QR-Code
                                    </label>
                                </div>
                                <div class="p-3 pt-0 d-none justify-content-center align-items-center" id="payment-qr-code">
                                    <img src="{{ asset('assets/qr-code.webp') }}" style="max-width: 100%">
                                </div>
                            @else
                                <strong class="text-dark">Payment Status : <b class="text-success"> Done</b></strong>
                            @endif


                            <input class="payment-checkbox visually-hidden" name="payment_method" type="checkbox"
                                value="{{ $orderData[0]->payment_method }}" checked />
                            <button type="button" class="custom-btn mt-3"
                                onclick="generateBill('{{ $orderData[0]->order_id }}','{{ route('customer.generateBill') }}',event)">Generate
                                Bill</button>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('customer.modal')
    @include('customer.footer-menu')
@endsection
