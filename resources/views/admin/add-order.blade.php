@extends('admin.main-orders')
@push('title')
    <title> Orders</title>
@endpush

@section('main-section')


    <div class="order-wrapper">
        <div class="order-sidebar">
            <div class="order-sidebar-header d-grid bg-primary ">
                <h5 class="text-uppercase text-center text-white">
                    Categories
                </h5>
            </div>
            <div class="order-sidebar-content">
                <div class="order-navigation">
                    <div class="list-group list-group-flush -0">
                        <a href="javascript:;" onclick="orderCategory('stared')"
                            class="list-group-item  d-flex align-items-center active" data-category='stared'>
                            <i class="fa-solid fa-star text-info"></i>
                            <span class="ps-2">Stared</span>
                            <span class="badge bg-info rounded-pill ms-auto text-dark" id="stared-count">
                                @php
                                    $stared = DB::table('stared_products')->count();
                                    echo $stared;
                                @endphp
                            </span>
                        </a>
                        @php
                            $CategoryData = DB::table('product_categories')
                                ->orderBy('cat_name', 'asc')
                                ->get();
                        @endphp
                        @if (count($CategoryData) != 0)
                            @foreach ($CategoryData as $single_CategoryData)
                                <a href="javascript:;" onclick="orderCategory('{{ $single_CategoryData->cat_id }}')"
                                    class="list-group-item  d-flex align-items-center"
                                    data-category='{{ $single_CategoryData->cat_id }}'>
                                    <i class="fa-solid fa-circle text-warning"></i>
                                    <span class="ps-2">{{ $single_CategoryData->cat_name }}</span>
                                    @if (getTotalProductOfCategory($single_CategoryData->cat_id) != 0)
                                        <span
                                            class="badge bg-info rounded-pill ms-auto text-dark">{{ getTotalProductOfCategory($single_CategoryData->cat_id) }}</span>
                                    @else
                                        <span
                                            class="badge bg-danger rounded-pill ms-auto">{{ getTotalProductOfCategory($single_CategoryData->cat_id) }}</span>
                                    @endif
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="order-header d-flex align-items-center">
            <div class="d-flex align-items-center w-100">
                <div class="container-fluid">

                    <div class="row">
                        <div
                            class="col-lg-8 d-flex align-item-center justify-content-lg-start justify-content-center p-0 mb-lg-0 mb-2">
                            <div class="order-toggle-btn"><i class='bx bx-menu'></i>
                            </div>

                            <div class="">
                                <a href="javascript:;" onclick="redirectTo('{{ route('admin.indexView') }}')"
                                    data-bs-toggle="tooltip" data-bs-title='Dashboard' data-bs-placement='auto'
                                    class="btn btn-white ms-sm-2 ms-0"><i class="fa-solid fa-home"></i>
                                </a>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-white ms-2" data-bs-toggle="tooltip"
                                    data-bs-title="Full Screen Mode" data-bs-placement="auto" onclick="fullScreen()"
                                    id="fullscreen-btn"> <i class='bx bx-fullscreen' id="fullscreen-icon"></i>
                                </button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-white ms-2" id="theme-change-btn"
                                    onclick="changeTheme()" data-bs-toggle="tooltip" data-bs-title="Switch to dark mood"
                                    data-bs-placement="auto"> <i class='bx bx-moon'></i>
                                </button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-warning text-nowrap ms-2" id="order-save-button"
                                    data-bs-toggle="tooltip" data-bs-title="Save order" data-bs-placement="auto"
                                    onclick="saveOrder()"> <i class="fa-solid fa-floppy-disk"></i> Save
                                    Order
                                </button>
                            </div>

                            <div class="flex-grow-1 ms-2 d-sm-block d-none">
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class="bx bx-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Type product id or name"
                                        onkeyup="productSearch(this.value)">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex align-item-center p-0 justify-content-lg-start justify-content-center">

                            <div class="">
                                <button type="button" data-bs-toggle="tooltip" data-bs-title='Add New Order'
                                    data-bs-placement='auto' onclick="resetOrder()" class="btn btn-warning ms-2">
                                    <i class="fa-regular fa-plus"></i> New Order
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" data-bs-toggle="tooltip" data-bs-title='Select Table'
                                    data-bs-placement='auto' onclick="selectTableModal('table-select-modal')"
                                    class="btn btn-warning ms-2">Table</button>

                            </div>
                            <div class="" id="customer-selection-btn">
                                <button type="button" data-bs-toggle="tooltip" data-bs-title='Customer Details'
                                    data-bs-placement='auto' class="btn btn-white ms-2"
                                    onclick="show_modal('order-customer-details')"><i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                            <div class="">
                                <button type="button" data-bs-toggle="tooltip" data-bs-title='Number Of People'
                                    data-bs-placement='auto' class="btn btn-white ms-2"
                                    onclick="show_modal('order-no-of-people')"><i class="fa-solid fa-users"></i>
                                </button>
                            </div>

                            <div class="">
                                <button type="button" data-bs-toggle="tooltip" data-bs-title='New or Reset'
                                    data-bs-placement='auto' onclick="resetOrder()" class="btn btn-white ms-2"><i
                                        class='bx bx-refresh me-0'></i>
                                </button>
                            </div>

                            {{-- <div class="">
                                <button type="button" class="btn btn-white ms-2" data-bs-toggle="tooltip"
                                    data-bs-title='Templates' data-bs-placement='auto'
                                    onclick="show_modal('order-template-details')"><i class='bx bx-file me-0'></i>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-content p-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-12 position-relative">
                        <div class="row">
                            <div class="col-12 mb-2 order-product-box overflow-control">
                                <div class="order-spiner d-none">
                                    <img src="{{ asset('admin-assets/assets/images/gif/spiner.svg') }}">
                                </div>
                                {{-- product box  --}}
                                <div class="row" id="order-product-data">

                                    {{-- @for ($i = 0; $i < 30; $i++)
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
                                                <div class="dropend">
                                                    <ul class="dropdown-menu bg-info">
                                                        <li><a class="dropdown-item text-dark" href="#">Fulll</a>
                                                        </li>
                                                        <li><a class="dropdown-item text-dark" href="#">Half</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-2  m-0">
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="KOT"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='kot' id="kot-btn">
                                        <i class="fa-regular fa-file-invoice"></i>
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-title="Order Bill"
                                        data-bs-placement="auto" class="btn btn-primary rounded-0 billing-toggle"
                                        data-billing-box='generate-bill' id="generate-bill-btn">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="tooltip"
                                        data-bs-title="Order Details & Status" data-bs-placement="auto"
                                        class="btn btn-primary rounded-0 billing-toggle d-none"
                                        data-billing-box='order-status' id="order-status-btn">
                                        <i class="fa-regular fa-burger-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row order-billing-row border">
                            <div class="billing-box col-12 p-0 overflow-control h-100 position-relative"
                                id="selected-item">
                                <div class="empty-selected-item">
                                    <img src="{{ asset('admin-assets/assets/images/icons/empty.png') }}">
                                </div>

                                <table class="table w-100">
                                    <thead class="selected-item-thead">
                                        <tr class="table-secondary">
                                            <th></th>
                                            <th class="p-1 font-13">Item</th>
                                            <th class="p-1 font-13">Quantity</th>
                                            <th class="p-1 font-13">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="selected-item-tbody">

                                    </tbody>
                                </table>

                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="instruction-details">
                                <div class="p-3">
                                    <h6> Order Intructions</h6>
                                    <div class="pt-3">
                                        <textarea name="" class="form-control" rows="10" placeholder="Type instructionos"
                                            id="order-instructions"></textarea>
                                    </div>
                                    <div class="pt-4 text-center">
                                        <button type="button" class="btn btn-primary"
                                            onclick="saveOrderInstruction('order-instructions')">Save </button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="kot">
                                <div class="p-3">
                                    <h6 class="text-capitalize">Kitchen order ticketing ( KOT )</h6>
                                    <div class="p-3 d-flex justify-content-center align-items-center mt-4">
                                        <img src="{{ asset('admin-assets/assets/images/icons/kot.png') }}"
                                            style="max-width:200px">
                                    </div>
                                    <div class="text-center py-3">
                                        <button type="button" class="btn btn-warning"
                                            onclick="generateKOT('print-btn-span1','download')">
                                            <span id="print-btn-span1">
                                                Download
                                            </span>
                                        </button>

                                        <button type="button" class="btn btn-warning"
                                            onclick="generateKOT('print-btn-span2','print')">
                                            <span id="print-btn-span2">
                                                <i class="fa-regular fa-print"></i>
                                                Print
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="amount-details">
                                <div class="p-3">
                                    <h6>Amount Details</h6>
                                    <ul class="list-group -0">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Total Item</span>
                                            <span id="amount-details-total-item"> </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Amount</span>
                                            <span id="amount-details-total-amount"></span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>GST Percentage</span>
                                            <span>20 %</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>GST Amount</span>
                                            <span id="amount-details-gst-amount"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Grand Total Amount</span>
                                            <span id="amount-details-grand-amount"></span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Discount</span>
                                            <span>
                                                <input type="number" class="form-control py-0" style="width:120px"
                                                    value="" id="discount-input"
                                                    onkeyup="calculatePaidAmount(this.value)">
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Paid Amount</span>
                                            <span>
                                                <input type="number" class="form-control py-0" style="width:120px"
                                                    value="" id="paid-amount-input"
                                                    onkeyup="calculateDueAmount(this.value)">
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Due Amount</span>
                                            <span>
                                                <input type="number" readonly class="form-control py-0"
                                                    style="width:120px" value="" id="due-input">
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="text-center pt-4">
                                        <button type="button" class="btn btn-primary"
                                            onclick="setDiscountAndPaidAmount()"> <i class="fa-solid fa-floppy-disk"></i>
                                            Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="collect-payment">
                                <div class="p-3">
                                    <h6>Collect Payment</h6>
                                    <div class="list-group" id="payment-method">
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
                                                name="other_method" value="">
                                        </label>
                                    </div>
                                    <div class="text-center pt-4">
                                        <button type="button" class="btn btn-primary" onclick="savePaymentMethod()"> <i
                                                class="fa-solid fa-floppy-disk"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100" id="generate-bill">
                                <div class="p-3">
                                    <h6>Order Bill</h6>
                                    <div class="p-3">
                                        <h6 class="text-capitalize"></h6>
                                        <div class="p-3 d-flex justify-content-center align-items-center mt-4">
                                            <img src="{{ asset('admin-assets/assets/images/icons/bill.png') }}"
                                                style="max-width:200px">
                                        </div>
                                        <div class="text-center py-3">
                                            <button type="button" class="btn btn-warning"
                                                onclick="printAndDownloadBill('download')">
                                                <span id="download-bill-span">
                                                    Download
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-warning"
                                                onclick="printAndDownloadBill('print')">
                                                <span id="print-bill-span">
                                                    <i class="fa-regular fa-print"></i>
                                                    Print
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-box col-12 p-0 d-none overflow-control h-100 position-relative"
                                id="order-status">
                                <div class="p-3">
                                    <h6 class="text-center font-20 text-uppercase">Order Details</h6>
                                    <div class="order-spiner">
                                        <img src="{{ asset('admin-assets/assets/images/gif/spiner.svg') }}">
                                    </div>
                                    <div id="order-details">

                                    </div>
                                    <div class="pb-4 text-center">
                                        <button type="button" class="btn btn-primary" onclick="completedOrder()"
                                            data-bs-toggle="tooltip" data-bs-title="Mark as completed"
                                            data-bs-placement="auto">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                            Complete
                                        </button>
                                    </div>
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
        <script src="{{ asset('admin-assets/assets/js/order.js') }}"></script>
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
