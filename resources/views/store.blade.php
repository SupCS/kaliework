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
              <form action="{{ route('store') }}" method="get" id="filter-form">
                <div class="filters">
                  <details class="filter-item">
                        <summary class="filter-h3">Колекція</summary>
                        <label class="checkbox-container">
                            Всі
                            <input type="checkbox" name="collections[]" value="all" {{ in_array('all', $selectedCollections) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                            <span class="checkmark"></span>
                        </label>
                        @foreach ($collections as $collection)
                            <label class="checkbox-container">
                                {{ $collection->name }}
                                <input type="checkbox" name="collections[]" value="{{ $collection->id }}" {{ in_array($collection->id, $selectedCollections) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </details>
                    <details class="filter-item">
                        <summary class="filter-h3">Тип товару</summary>
                        <label class="checkbox-container">
                            Всі
                            <input type="checkbox" name="types[]" value="all" {{ in_array('all', $selectedTypes) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                            <span class="checkmark"></span>
                        </label>
                        @foreach ($types as $type)
                            <label class="checkbox-container">
                                {{ $type->name }}
                                <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ in_array($type->id, $selectedTypes) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </details>
                    <details class="filter-item">
                      <summary class="filter-h3">Аромат</summary>
                      <label class="checkbox-container">
                          Всі
                          <input type="checkbox" name="aromas[]" value="all" {{ in_array('all', $selectedAromas) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                          <span class="checkmark"></span>
                      </label>
                      @foreach ($aromas as $aroma)
                          <label class="checkbox-container">
                              {{ $aroma->name }}
                              <input type="checkbox" name="aromas[]" value="{{ $aroma->id }}" {{ in_array($aroma->id, $selectedAromas) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                              <span class="checkmark"></span>
                          </label>
                      @endforeach
                  </details>
                  <details class="filter-item">
                      <summary class="filter-h3">Розмір</summary>
                      <label class="checkbox-container">
                          Всі
                          <input type="checkbox" name="sizes[]" value="all" {{ in_array('all', $selectedSizes) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                          <span class="checkmark"></span>
                      </label>
                      @foreach ($sizes as $size)
                          <label class="checkbox-container">
                              {{ $size->name }}
                              <input type="checkbox" name="sizes[]" value="{{ $size->id }}" {{ in_array($size->id, $selectedSizes) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                              <span class="checkmark"></span>
                          </label>
                      @endforeach
                  </details>
                  <details class="filter-item">
                      <summary class="filter-h3">Фітиль</summary>
                      <label class="checkbox-container">
                          Всі
                          <input type="checkbox" name="wicks[]" value="all" {{ in_array('all', $selectedWicks) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                          <span class="checkmark"></span>
                      </label>
                      @foreach ($wicks as $wick)
                          <label class="checkbox-container">
                              {{ $wick->name }}
                              <input type="checkbox" name="wicks[]" value="{{ $wick->id }}" {{ in_array($wick->id, $selectedWicks) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                              <span class="checkmark"></span>
                          </label>
                      @endforeach
                  </details>
                </div>
            </form>
            </div>
            <div class="products-block">
                @foreach ($products as $product)
                    <div class="product-card" data-product-id="{{ $product->id }}">
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
                        <svg class=heart-icon-svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                          viewBox="0 0 471.701 471.701" xml:space="preserve">
                        <g>
                          <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
                            c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
                            l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
                            C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
                            s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
                            c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
                            C444.801,187.101,434.001,213.101,414.401,232.701z"/>
                        </g>
                        </svg>
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
    @include('layouts.like')
    @include('layouts.cart')
    @include('layouts.footer')
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/favorite.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/priceslider.js') }}"></script>
</html>
