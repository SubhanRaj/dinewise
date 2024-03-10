@extends('customer.main')
@push('style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Hind', sans-serif;
        }

        body,
        html {
            user-select: none;
        }

        .order-title {
            background-color: #fd3550;
            font-size: 20px;
            text-align: center;
            color: #fff;
            padding: 10px
        }

        .category-box {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .menu-category {
            width: 100%;
            margin-right: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-category ul {
            list-style: none;
            display: block;
            width: 100%;
            padding: 0;
            overflow-x: scroll;
            white-space: nowrap;

        }

        .menu-category ul::-webkit-scrollbar {
            width: 0px;
            height: 0px;
        }

        .menu-category ul::-webkit-scrollbar-thumb {
            height: 0px;
            width: 0px;
            background-color: #fd3550;
            border-radius: 30px
        }

        .menu-category ul li {
            display: inline-block;
            margin: 0 5px
        }

        .menu-category ul li button {
            border: 1px solid #fd3550;
            padding: 8px 15px;
            border-radius: 20px;
            color: #000;
            background-color: #fff;
        }

        .menu-category ul li button:hover {
            background-color: #fd3550;
        }

        .product-box {
            border: 2px solid #eee;
            border-radius: 10px;
            overflow: hidden;
        }

        .product-row {
            padding-top: 15px
        }

        .product-image {
            width: 100%;
        }

        .product-image img {
            width: 100%
        }

        .product-category {
            padding: 0 10px;
            display: block;
            margin-top: 10px;
            font-size: 12px;
        }

        .product-name {
            padding: 0 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .product-add {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* background-color: #ffe4e4; */
            /* padding: 10px; */
        }

        .product-add .unit {
            color: #000;
            font-weight: bold
        }

        .product-add .price {
            color: #000;
            font-weight: bold
        }

        .product-add .add .add-btn {
            background-color: #fd3550;
            border: none;
            outline: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: #fff
        }

        .product-add .add .add-btn:hover {
            background-color: #fd3550
        }

        .unit-select {
            padding: 5px;
            color: #303030;
            border: 1px solid #eee;
            outline-color: #fd3550;
            font-size: 12px;
            border-radius: 10px;
        }

        .category_active {
            background-color: #fd3550 !important;
            color: #fff !important;
        }

        .customer_order_spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1;
            background-color: #00000070;
        }

        .customer_order_spinner img {
            height: 80px
        }

        .order-box {
            border-radius: 10px;
        }

        .order-box-pro-name {
            padding: 5px;
            margin-bottom: 0;
            font-size: 15px;
        }

        .order-box-amount {
            font-weight: 600;
            font-size: 16px;
            padding: 5px
        }

        .qty-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25px;
            border-radius: 5px;
            overflow: hidden;
        }

        .qty-btn {
            border: none;
            outline: none;
            width: 20px;
            background-color: #fd3550;
            color: #fff;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .qty-input {
            height: 100%;
            width: 40px;
            text-align: center;
            border: 1px solid #fd3550
        }

        .remove-btn{
             background-color: #fd3550;
             color: #fff;
             border: none;
             outline: none;
             padding: 5px 10px;
             font-size: 12px;
             border-radius: 50px;
        }

        .sticky-product-details {
            position: fixed;
            bottom: -100%;
            z-index: 1;
            background-color: #fff;
            width: 100%;
            height: 60vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.150);
            padding-bottom: 20px;
            transition: .4s;
            border-top: 1px solid #fd3550;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px
        }


        .sticky-product-details-wrapper {
            overflow-y: auto;
            height: 90%;
        }

        .sticky-product-details-show {
            bottom: 0;
        }

        .hide-sticky-product-details-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hide-sticky-product-details {
            border: none;
            outline: none;
            background-color: #fd3550;
            color: #fff;
            width: 50px;
            height: 30px;
            border-bottom-left-radius: 30%;
            border-bottom-right-radius: 30%;
            font-size: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.150);
        }

        .sticky-bottom-button {
            position: fixed;
            z-index: 2000;
            background-color: #fff;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.150)
        }

        .sticky-bottom-button .order-sticky-button {
            width: 50%;
            padding: 8px;
            border: 1px solid #fd3550;
        }

        .product-details {
            background-color: #fd3550;
            color: #fff;
        }

        .product-continue {
            background-color: #fff;
        }

        .button {
            padding: 8px 15px;
            border: 1px solid;
            outline: none;
            background-color: #fd3550;
            color: #fff;
            border-radius: 5px;
        }

        .accordion-item {
            border-color: #fd355065
        }

        .accordion-button:not(.collapsed) {
            color: #fff;
            font-size: 15px;
            background-color: #fd3550;
        }

        .accordion-button {
            padding: 10px;
            border: none
        }

        .accordion-button:focus {
            border-color: #fd3550 !important;
            box-shadow: none;
        }

        .accordion {
            --bs-accordion-btn-icon-width: 15px
        }


        @media screen and (max-width:768px) {
            #selected-products tr td:nth-child(2) {
                padding-right: 10px
            }
        }

        .product-container {
            padding-bottom: 50px
        }

        .search-pro-box {
            display: flex;
            border-radius: 50px;
            border: 1px solid red;
            overflow: hidden;
            margin-bottom: 10px
        }

        .search-pro-box input {
            width: 90%;
            border: none;
            padding: 8px 10px 8px 20px;
            outline: none;
        }

        .search-pro-box span {
            width: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .no-product {
            text-align: center;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-list-box {
            display: flex;
            justify-content: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.150);
            padding: 10px;
        }

        .product-list-img {
            padding: 5px;
            border-radius: 5px;
            overflow: hidden;
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-list-img img {
            width: 100%;
            border-radius: 10px
        }

        .product-list-content {
            width: 70%;
            padding-left: 10px;
            border-left: 1px solid #eee
        }

        .product-list-title {
            display: block;
            font-size: 17px;
        }

        .product-list-category {
            font-size: 14px;
        }
    </style>
@endpush
@section('main-section')
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <h4 class="order-title">Order Placement </h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">

                <div class="search-pro-box">
                    <input type="text" onkeyup="searchProduct(this.value)" placeholder="Search product">
                    <span id="basic-addon1">
                        <i class="fa-solid fa-search"></i>
                    </span>
                </div>
            </div>
            {{-- <div class="col-2">
                <button class="btn btn-danger" id="reset-button" onclick="resetOrder()" type="button">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div> --}}
            <div class="col-12 category-box">
                <div class="menu-category">
                    <ul>
                        @foreach ($category as $single_category)
                            <li> <button class="category_button" id="category_{{ $single_category->cat_id }}"
                                    onclick="selectCategory('{{ $single_category->cat_id }}')"
                                    type="button">{{ $single_category->cat_name }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
 
            <div class="col-12 mb-4 d-none" id="order-details-accordian-box">
                <div class="accordion" id="order-details-accordian">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="acc-head-your-details">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#acc-your-details" aria-expanded="true" aria-controls="acc-your-details">
                                Your Details
                            </button>
                        </h2>
                        <div id="acc-your-details" class="accordion-collapse collapse show"
                            aria-labelledby="acc-head-your-details" data-bs-parent="#order-details-accordian">
                            <div class="accordion-body">
                                <div class="d-none" id="customer-details-after-order">
                                    <table class="table table-borderless">
                                        <tbody id="customer-details-table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="acc-head-order-details">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#acc-order-details" aria-expanded="false" aria-controls="acc-order-details">
                                Order Details
                            </button>
                        </h2>
                        <div id="acc-order-details" class="accordion-collapse collapse"
                            aria-labelledby="acc-head-order-details" data-bs-parent="#order-details-accordian">
                            <div class="accordion-body">
                                <div class="d-none" id="product-details-after-order">
                                    <span class="badge text-bg-success font-14 mb-3">Order Id: {{ $order_id }}</span>
                                    <table class="table table-borderless">
                                        <thead class="table-success">
                                            <tr>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="product-details-tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="acc-head-payment-details">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#acc-payment-details" aria-expanded="false"
                                aria-controls="acc-payment-details">
                                Payment Details
                            </button>
                        </h2>
                        <div id="acc-payment-details" class="accordion-collapse collapse"
                            aria-labelledby="acc-head-payment-details" data-bs-parent="#order-details-accordian">
                            <div class="accordion-body">
                                <div id="payment-details-after-order">
                                    <table class="table table-borderless">
                                        <tbody id="payment-table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="ps-2">
                                    <button type="button" class="button" onclick="generateBill()">Generate
                                        Bill</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 px-4 product-container">
                {{-- <div class="row">
                    <div class="col-12 p-0 mb-2">
                        <div class="product-list-box">
                            <div class="product-list-img">
                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}" alt="">
                            </div>
                            <div class="product-list-content">
                                <span class="product-list-category">Category</span>
                                <h6 class="product-list-title">
                                    Lorem ipsum dolor sit amet.
                                </h6>
                                <div class="product-add">
                                    <div class="unit" id="unit_0"><select id="unit_select_0"
                                            onchange="getPrice('price_0','unit_price0','price_val_0',event)"
                                            class="unit-select">
                                            <option value="Full">Full</option>
                                            <option value="kg">kg</option>
                                        </select></div>
                                    <div class="price" id="price_0">Rs.200</div>
                                    <div class="add">
                                        <input type="hidden" value="200" id="price_val_0">
                                        <input type="hidden" value="AF1E900E47" id="auto_product_id_0">
                                        <input type="hidden" value="Skye Tehoeder " id="product_name_0">
                                        <span id="action_box_0">
                                            <button type="button" class="add-btn" id="action_0"
                                                onclick="selectProduct('0')"> <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row product-row">

                </div>
            </div>
        </div>
    </div>

    <div class="sticky-product-details">
        <div class="hide-sticky-product-details-box">
            <button type="button" class="hide-sticky-product-details" onclick="showHideProductDetails()"> <i
                    class="fa-regular fa-chevron-down"></i> </button>
        </div>
        <div class="sticky-product-details-wrapper">
            <table class="table" id="selected-products"></table>
        </div>
    </div>

    <div class="sticky-bottom-button" id="sticky-bottom-button">
        <button type="button" class="order-sticky-button product-details" onclick="showHideProductDetails()">Product
            Details</button>
        <button type="button" class="order-sticky-button product-continue"
            onclick="continue_modal('customer-detail-modal')">Continue</button>

    </div>


    <div class="modal fade" style="background-color: #fff; z-index:2000" id="customer-detail-modal" tabindex="-1"
        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Customer Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="customer-details">
                        <div id="order-alert">

                        </div>
                        {{-- hidden inputs  --}}

                        <input type="hidden" name="table_no" value="{{ $table_no }}">

                        <div class="col-12 mb-3">
                            <label for="">Your Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Name"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="">Your Phone Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="phone" required
                                placeholder="Enter Your Phone Number">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="">Your Email Address</label>
                            <input type="email" class="form-control" name="email"
                                placeholder="Enter Your Email Address">
                        </div>
                        {{-- <div class="col-12 mb-3">
                            <label for="">Number of people <span class="text-danger">*</span></label>
                        </div> --}}
                        <input type="hidden" name="no_of_people" value="1" class="form-control"
                            placeholder="Number of people">
                        <div class="col-12 mb-3">
                            <label for="">Your Birth Date</label>
                            <input type="date" name="dob" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <p><b class="text-danger">Note: </b>Once you place order you can't edit customer details.</p>
                        </div>
                        {{-- <div class="col-6 mb-3 text-start" id="place-order-btn">
                                <button type="button" class="btn btn-primary" onclick="placeOrder()">Place
                                    Order</button>
                            </div>
                            <div class="col-6 mb-3 text-end" id="reset-order-btn">
                                <button type="button" class="btn btn-danger" onclick="resetOrder()">Reset
                                    Order </button>
                            </div> --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button" onclick="placeOrder()">Place Order</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="customer_order_spinner">
        <img src="{{ asset('admin-assets/assets/images/gif/spiner.svg') }}">
    </div> --}}

    @push('scripts')
        <script src="{{ asset('admin-assets/assets/js/customer.js') }}?v={{ time() }}"></script>
        <script>
            getOrderDetailsUsingOrderId({{ Js::from($order_id) }})
        </script>
    @endpush
@endsection
