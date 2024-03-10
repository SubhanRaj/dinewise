@extends('admin.main-orders')
@push('title')
    <title>Add Orders</title>
@endpush
@section('main-section')

    <div class="order-wrapper">
        <div class="order-sidebar">
            <div class="order-sidebar-header d-grid bg-primary ">
                <h5 class="text-uppercase text-center text-white">Categories</h5>
            </div>
            <div class="order-sidebar-content">
                <div class="order-navigation">
                    <div class="list-group list-group-flush">
                        <a href="" class="list-group-item  d-flex align-items-center">
                            <i class="fa-solid fa-star text-info"></i>
                            <span class="ps-2">Stared</span>
                            <span class="badge bg-info rounded-pill ms-auto">100 </span></a>
                        @php
                            $CategoryData = DB::table('product_categories')
                                ->orderBy('cat_name', 'asc')
                                ->get();
                        @endphp
                        @if (count($CategoryData) != 0)
                            @foreach ($CategoryData as $single_CategoryData)
                                <a href="" class="list-group-item  d-flex align-items-center">
                                    <i class="fa-solid fa-circle text-warning"></i>
                                    <span class="ps-2">{{ $single_CategoryData->cat_name }}</span>
                                    <span
                                        class="badge bg-info rounded-pill ms-auto">{{ getTotalProductOfCategory($single_CategoryData->cat_id) }}</span></a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="order-header d-flex align-items-center">
            <div class="d-flex align-items-center w-100">
                <div class="order-toggle-btn"><i class='bx bx-menu'></i>
                </div>
                <div class="btn-group">
                    <button type="button" data-bs-toggle="tooltip" data-bs-title='Select Table' data-bs-placement='auto'
                        onclick="show_modal('table-select-modal')" class="btn btn-warning">Table</button>
                    <button type="button" data-bs-toggle="tooltip" data-bs-title='Select Table' data-bs-placement='auto'
                        onclick="show_modal('table-select-modal')" class="btn btn-warning split-bg-warning">
                        <span class="font-18">
                            25
                        </span>
                    </button>

                </div>

                <div class="">
                    <button type="button" data-bs-toggle="tooltip" data-bs-title='Customer Details'
                        data-bs-placement='auto' class="btn btn-white ms-2"
                        onclick="show_modal('order-customer-details')"><i class="fa-solid fa-user"></i>
                    </button>
                </div>
                <div class="">
                    <button type="button" data-bs-toggle="tooltip" data-bs-title='Reset' data-bs-placement='auto'
                        class="btn btn-white ms-2"><i class='bx bx-refresh me-0'></i>
                    </button>
                </div>

                <div class="">
                    <button type="button" class="btn btn-white ms-2" data-bs-toggle="tooltip" data-bs-title='Templates'
                        data-bs-placement='auto' onclick="show_modal('order-template-details')"><i
                            class='bx bx-file me-0'></i>
                    </button>
                </div>

                <div class="flex-grow-1 ms-2 d-sm-block d-none">
                    <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search Product">
                    </div>
                </div>
                <div class="flex-grow-1 ms-2 d-sm-none d-block">
                    <button type="button" class="btn btn-white ms-2"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>


        </div>
        <div class="order-content p-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-12 border">
                        <div class="row">
                            <div class="col-12 mb-2 order-product-box overflow-control">
                                {{-- product box  --}}
                                <div class="row">
                                    @for ($i = 0; $i < 30; $i++)
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="card radius-10 order-product-card " data-bs-toggle="dropdown">
                                                <div class="card-body pb-0">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="order-product-img p-1 rounded">
                                                                <img
                                                                    src="{{ asset('admin-assets/assets/images/icons/hamburger.png') }}">
                                                            </div>
                                                            <p class="ps-3">
                                                                <i
                                                                    class="fa-sharp fa-solid fa-indian-rupee-sign text-warning"></i>
                                                                100
                                                            </p>
                                                        </div>
                                                        <p> Lorem ipsum dolor sit amet.
                                                        </p>
                                                        <div class="order-product-star ms-auto font-13">
                                                            <i class="fa-thin fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- dropdown  --}}
                                                <div class="dropend">
                                                    <ul class="dropdown-menu bg-info">
                                                        <li><a class="dropdown-item text-dark" href="#">Fulll</a></li>
                                                        <li><a class="dropdown-item text-dark" href="#">Half</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-2 border m-0">
                        <div class="row">
                            <div class="col-12 p-0 order-billing-icons">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Selected Items"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 active billing-toggle"
                                        data-billing-box='selected-item' id="select-item-btn">
                                        <i class="fa-solid fa-list"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Order Instructions"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='instruction-details' id="instruction-details-btn">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Amount Details"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='amount-details' id="amount-details-btn">
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Collect Payment"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='collect-payment' id="collect-cash-btn">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Order Bill & KOT"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='generate-bill' id="generate-bill-btn">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row order-billing-row">
                            <div class="billing-box col-12 p-0 overflow-control h-100" id="selected-item">

                                <table class="table w-100">
                                    <thead class="selected-item-thead">
                                        <tr class="table-secondary">
                                            <th></th>
                                            <th class="p-1 font-13">Item</th>
                                            <th class="p-1 font-13">Quantity</th>
                                            <th class="p-1 font-13">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td style="width:20px" class="p-0 align-middle"> <button type="button"
                                                        class="order-remove-btn"> <i
                                                            class="fa-regular fa-circle-xmark text-danger"></i></button>
                                                </td>
                                                <td class="font-13 px-0 align-middle">
                                                    {{ $i }} Lorem,
                                                    ipsum dolor sit amet
                                                    <span class="order-item-unit text-secondary">Full</span>
                                                </td>
                                                <td>
                                                    <div class="order-quantity-box">
                                                        <div class="input-group flex-nowrap">
                                                            <button class="input-group-text">
                                                                <i class="fa-regular fa-minus"></i>
                                                            </button>
                                                            <input type="text" class="form-control"
                                                                style="max-width:50px" value="1">
                                                            <button class="input-group-text">
                                                                <i class="fa-regular fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    1000
                                                </td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                </table>

                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="instruction-details">
                                <div class="p-3">
                                    <h6> Order Intructions</h6>
                                    <div class="pt-3">
                                        <textarea name="" class="form-control" rows="10" placeholder="Type instructionos"></textarea>
                                    </div>
                                    <div class="pt-4 text-center">
                                        <button type="button" class="btn btn-primary">Next <i
                                                class="fa-sharp fa-solid fa-arrow-right-long"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="amount-details">
                                <div class="p-3">
                                    <h6>Amount Details</h6>
                                    <ul class="list-group border-0">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Total Item</span>
                                            <span>₹ 100 </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Amount</span>
                                            <span>₹ 100</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>GST Percentage</span>
                                            <span>20 %</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>GST Amount</span>
                                            <span>₹ 200</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Discount</span>
                                            <span>
                                                <input type="number" class="form-control py-0" style="width:120px"
                                                    value="0">
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Paid Amount</span>
                                            <span>
                                                <input type="number" class="form-control py-0" style="width:120px"
                                                    value="0">
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Due Amount</span>
                                            <span>
                                                <input type="number" class="form-control py-0" style="width:120px"
                                                    value="0">
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="text-center pt-4">
                                        <button type="button" class="btn btn-primary">Next <i
                                                class="fa-sharp fa-solid fa-arrow-right-long"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="collect-payment">
                                <div class="p-3">
                                    <h6>Collect Payment</h6>
                                    <div class="list-group">
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="cash">
                                            Cash
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="card">
                                            Card
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="googlepay">
                                            Google Pay
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="phonepay">
                                            Phone Pay
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="paytm">
                                            PayTm
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="bharatpay">
                                            Bharat Pay
                                        </label>
                                        <label class="list-group-item">
                                            <input class="collect-payment-method form-check-input me-1" type="radio"
                                                name="method" value="other">
                                            Other
                                        </label>
                                        <label class="list-group-item d-none" id="collect-payment-other">
                                            <input class="collect-payment-method form-control" type="text"
                                                name="method" value="">
                                        </label>
                                    </div>
                                    <div class="text-center pt-4">
                                        <button type="button" class="btn btn-primary"> <i
                                                class="fa-solid fa-floppy-disk"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="generate-bill">
                                <div class="p-3">
                                    <h6>Order Bill & KOT</h6>

                                    <ul class="list-group mt-4">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>KOT </span>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Download" class="btn btn-warning">
                                                    <i class="fa-sharp fa-solid fa-download"></i>
                                                </button>
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Print" class="btn btn-warning">
                                                    <i class="fa-sharp fa-solid fa-print"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Bill </span>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Download" class="btn btn-warning">
                                                    <i class="fa-sharp fa-solid fa-download"></i>
                                                </button>
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Print" class="btn btn-warning">
                                                    <i class="fa-sharp fa-solid fa-print"></i>
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="overlay order-toggle-btn-mobile"></div>
    </div>


    @include('admin.order-modal')

    @push('scripts')
        <script>
            // $(".wrapper").addClass('toggled')
            // $(function() {
            //     if ($(".wrapper").hasClass('toggled')) {
            //         $(".sidebar-wrapper").hover(function() {

            //             $('.logo-big').removeClass('d-none')
            //             $('.logo-sm').addClass('d-none')
            //             $(".wrapper").addClass("sidebar-hovered")
            //         }, function() {
            //             $('.logo-big').addClass('d-none')
            //             $('.logo-sm').removeClass('d-none')
            //             $(".wrapper").removeClass("sidebar-hovered")
            //         })
            //     }
            // })

            // $('.toggle-icon').hide();

            let toggleBillingBoxBtn = localStorage.getItem('toggleBillingBoxBtn')
            let toggleBillingBox = localStorage.getItem('toggleBillingBox')

            if (toggleBillingBox != null && toggleBillingBoxBtn != null) {
                $('.billing-box').addClass('d-none').removeClass('d-block')
                $('.billing-toggle').removeClass('active')
                $('#' + toggleBillingBox).addClass('d-block').removeClass('d-none')
                $('#' + toggleBillingBoxBtn).addClass('active')
            }
        </script>
    @endpush
@endsection
