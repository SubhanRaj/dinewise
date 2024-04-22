<footer>
    <div class="footer-items">
        <a href="{{ route('customer.customerShopping') }}" class="footer-menu" id="footer-shop"><i
                class="fa-regular fa-shop"></i></a>
    </div>
    <div class="footer-items">
        <button type="button" class="footer-menu" onclick="startScanning()"><i class="fa-solid fa-qrcode"></i></button>
    </div>
    <div class="footer-items">
        <button type="button" id="footer-order-details" class="footer-menu"
            onclick="showOrder('{{ route('customer.account') }}')"><i class="fa-regular fa-burger-soda"></i></button>
    </div>
    <div class="footer-items">
        <button type="button" id="footer-cart" class="footer-menu" onclick="showHideCart('show')"><i
                class="fa-regular fa-cart-shopping"></i> <span class="cart-count">0</span> </button>
    </div>
</footer>
