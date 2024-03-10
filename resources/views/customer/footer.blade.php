<div class="cart-container">
    <div class="cart-details">
        <button type="button" onclick="showHideCart('hide')" class="cart-close"><i
                class="fa-regular fa-xmark"></i></button>
        <div class="cart-product-wrapper" id="selected-products">
            {{-- <div class="cart-product-details">
                <div class="cart-product-content">
                    <div class="cart-product-img">
                        <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}" alt="">
                    </div>
                    <div class="cart-product-name-box">
                        <strong class="cart-product-name">Product Name</strong>
                        <span class="cart-product-unit">Unit</span>
                        <strong class="cart-product-price">₹200</strong>
                    </div>
                </div>
                <div class="cart-product-qty">
                    <div class="qty-btn">
                        <button type="button">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span>2</span>
                        <button type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


    <a href="{{ route('customer.customerShoppingPayment') }}" class="next-button">Next <span> <i
                class="fa-regular fa-arrow-right"></i></span></a>

</div>


<div class="sub-unit-container">
    <div class="sub-unit-details">
        <button type="button" onclick="showHideSubUnit('hide')" class="sub-unit-close"><i
                class="fa-regular fa-xmark"></i></button>
        <div class="sub-unit-wrapper" id="sub-unit-wrapper">
            {{-- <div class="sub-unit-product-details">
                <div class="sub-unit-product-content">
                    <div class="sub-unit-product-img">
                        <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}" alt="">
                    </div>
                    <div class="sub-unit-product-name-box">
                        <span class="sub-unit-product-unit">Unit</span>
                        <strong class="sub-unit-product-price">₹200</strong>
                    </div>
                </div>
                <div class="sub-unit-product-qty">
                    <div class="add-btn"><button type="button"  > Add</button></div>
                </div>
            </div> --}}

        </div>
    </div>
</div>



<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<div class="back-top">
    <span onclick="backToTop()"> <i class="fa-regular fa-circle-arrow-up"></i> Back to top</span>
</div>
</div>
<!--end wrapper-->
<div class="loading-box d-none">
    <img src="{{ asset('admin-assets/assets/images/gif/spiner.svg') }}">
</div>
<!-- Bootstrap JS -->
<script src="{{ asset('admin-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin-assets/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>

<script src="{{ asset('admin-assets/assets/plugins/dselect/dselect.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/app.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/data-table-checkbox.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/get-data-ajax.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/jquery-confirm.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/customer/customer.js') }}?v={{ time() }}"></script>

@stack('scripts')
</body>

</html>
