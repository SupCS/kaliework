<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Магазин KalieSoap&KalieCandle</title>
</head>
<body class="store-page">
<div class="wrapper">
@include('layouts.header')
<div class="main">
        <div class="container">
          <div class="forsmallcontainer">
            <div class="searchbar">
              <input type="text" placeholder="Пошук" />
              <button type="submit"><img src="./img/lupaicon.svg" /></button>
            </div>
            <div class="small-filters">
              <img src="./img/filters.svg" />
              <p>Фільтри</p>
            </div>
          </div>
          <div class="store-flex">
            <div class="filters-side-bar">
            <div class="price-filter">
                <div class="price-filter-title">
                  <p>Ціна</p>
                </div>
                <div class="price-slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input
                    type="range"
                    class="range-min"
                    min="0"
                    max="5000"
                    value="0"
                    step="50"
                  />
                  <input
                    type="range"
                    class="range-max"
                    min="0"
                    max="5000"
                    value="5000"
                    step="50"
                  />
                </div>
                <div class="price-input">
                  <div class="field">
                    <input type="number" class="input-min" value="0" />
                  </div>
                  <div class="separator"></div>
                  <div class="field">
                    <input type="number" class="input-max" value="5000" />
                  </div>
                </div>
              </div>
              <div class="filters">
                <details class="filter-item">
                  <summary class="filter-h3">Колекція</summary>
                  <label class="checkbox-container"
                    >Всі
                    <input type="checkbox" checked="checked" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >HOUSE
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >KIDS
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Body
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Valentine's
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Friendship
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                </details>
                <details class="filter-item">
                  <summary class="filter-h3">Тип товару</summary>
                  <label class="checkbox-container"
                    >Всі
                    <input type="checkbox" checked="checked" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Свічки
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Мило
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Набори
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Сертифікати
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                </details>
                <details class="filter-item">
                  <summary class="filter-h3">Аромат</summary>
                  <label class="checkbox-container"
                    >Всі
                    <input type="checkbox" checked="checked" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Цитрусові
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Квіти
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Фрукти
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Екзотика
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Кастомні
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                </details>
                <details class="filter-item">
                  <summary class="filter-h3">Розмір</summary>
                  <label class="checkbox-container"
                    >Всі
                    <input type="checkbox" checked="checked" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Великі
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Маленькі
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                </details>
                <details class="filter-item">
                  <summary class="filter-h3">Фітиль</summary>
                  <label class="checkbox-container"
                    >Всі
                    <input type="checkbox" checked="checked" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Дерев'яний
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                  <label class="checkbox-container"
                    >Бавовняний
                    <input type="checkbox" />
                    <span class="checkmark"></span>
                  </label>
                </details>
              </div>
            </div>
            <div class="products-block">
                @foreach ($products as $product)
                    <div class="product-card">
                        <a href="{{ route('product', ['id' => $product->id]) }}">
                        <div class="product-card-img">
                            @if (isset($product->image))
                                <img src="{{ asset('img/' . $product->image) }}" />
                            @else
                                <img src="{{ asset('img/bodycard.jpg') }}" />
                            @endif
                        </div>
                            <div class="product-card-content">
                                <h5 class="product-card-title">{{ $product->name }}</h5>
                                <p class="product-card-description">
                                    {{ $product->description }}
                                </p>
                                <span class="product-card-price">{{ $product->price }} ₴</span>
                            </div>
                        </a>
                        <div class="heart-icon">
                            <img class="heart-icon-svg" src="{{ asset('img/like.svg') }}" />
                        </div>
                        <div class="cart-icon">
                            <img class="cart-icon-svg" src="{{ asset('img/catricon.svg') }}" />
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    @include('layouts.cart')
    @include('layouts.footer')
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/priceslider.js') }}"></script>
</html>
