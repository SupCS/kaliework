<button class="cart" id="cart">
<img class="cart__image" src="./img/cart.png" alt="Cart" />
<div class="cart__num" id="cart_num">0</div>
</button>
<div class="popup">
    <div class="popup__container" id="popup_container">
        <div class="popup__item">
            <h1 class="popup__title">Оформлення замовлення</h1>
        </div>
         <div class="popup__item product-list" id="popup_product_list">
    <!-- Тут динамічно додаються продукти -->
        </div>
    <div class="popup__item">
        <div class="popup__cost">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><button class="popup__checkout-button" id="popup_checkout_button">
            Перейти до оплати
            </button></a>
            <div class="popup__total">
                <h2 class="popup__cost-title">Всього</h2>
                <output class="popup__cost-value" id="popup_cost">0</output>
            </div>
        </div>
    </div>
    <div class="popup__close" id="popup_close">✖</div>
</div>
</div>