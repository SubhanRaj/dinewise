<footer>
    <div class="footer-items">
        <button type="button" class="footer-menu" id="footer-shop" onclick="shopPage()"><i
                class="fa-regular fa-shop"></i></button>
    </div>
    <div class="footer-items">
        <button type="button" id="footer-order-details" class="footer-menu" onclick="showOrder('{{ route('customer.account') }}')"><i
                class="fa-regular fa-burger-soda"></i></button>
    </div>
    <div class="footer-items">
        <button type="button" id="footer-cart" class="footer-menu" onclick="showHideCart('show')"><i
                class="fa-regular fa-cart-shopping"></i> <span class="cart-count">0</span> </button>
    </div>
</footer>
