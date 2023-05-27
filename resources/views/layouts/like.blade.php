<button class="favorite" id="favorite">
<img class="favorite__image" src="{{ asset('img/heart.png') }}" alt="Favorite" />
<span id="favorite_num" style="display: none;">0</span>
</button>
<div class="popup_favorite">
    <div class="popup_favorite__container" id="popup_favorite_container">
        <div class="popup_favorite__item">
            <h1 class="popup_favorite__title">Обрані</h1>
        </div>
         <div class="popup_favorite__item favorite_product-list" id="popup_favorite_product_list">
    <!-- Тут динамічно додаються продукти -->
        </div>
    <div class="popup_favorite__close" id="popup_favorite_close">✖</div>
</div>
</div>