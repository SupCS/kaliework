<!DOCTYPE html>
<html lang="uk">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/product.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Продукт KalieSoap&KalieCandle</title>
  </head>
  <body class="product-page">
    <div class="wrapper">
    @include('layouts.header')
      <div class="main">
        <div class="container">
          <div class="product-info" data-product-id="{{ $product->id }}">
            <div class="product-info-photo">
              @if (isset($product->image))
                  <img src="{{ asset('img/' . $product->bigImage) }}" />
              @else
                  <img src="{{ asset('img/bodycard.jpg') }}" />
              @endif
            </div>
            <div class="product-info-main">
              <div class="product-info-head">
                <h1 class="product-info-name">{{ $product->name }}</h1>
                <h1 class="product-info-price">{{ number_format($product->price, 0, '', ' ') }} ₴</h1>
              </div>
              <div class="product-color">
                  <h3 class="product-info-title">Колір</h3>
                  <ul class="color-panel">
                  @foreach ($product->colors as $color)
                      <li class="cp cp-{{ $color->name }}{{ $loop->first ? ' active' : '' }}" data-color="{{ $color->name }}"></li>
                  @endforeach
                  </ul>
              </div>
              <div class="product-wick">
                <h3 class="product-info-title">Фітиль</h3>
                @if ($product->wicks->count() > 0)
                @php
                  $defaultWick = $product->wicks->first()->name;
                @endphp
                  <div class="dropdown">
                    <button onclick="toggleDropdown('wick-dropdown')" class="dropbtn">
                      <span class="dropbtn-text">{{ $defaultWick }}</span>
                    </button>
                    <div id="wick-dropdown" class="dropdown-content">
                      @foreach ($product->wicks as $wick)
                        <a href="#" data-wick="{{ $wick->name }}">{{ $wick->name }}</a>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>
              <div class="product-aroma">
                <h3 class="product-info-title">Аромат</h3>
                @if ($product->aromas->count() > 0)
                @php
                  $defaultAroma = $product->aromas->first()->name;
                @endphp
                  <div class="dropdown">
                    <button onclick="toggleDropdown('aroma-dropdown')" class="dropbtn">
                      <span class="dropbtn-text">{{ $defaultAroma }}</span>
                    </button>
                    <div id="aroma-dropdown" class="dropdown-content">
                      @foreach ($product->aromas as $aroma)
                        <a href="#" data-aroma="{{ $aroma->name }}">{{ $aroma->name }}</a>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>
              <div class="product-info-description">
                <span class="info-description-name">{{ $product->name }}</span> -
                свічка жіночого тіла, що ідеально передає його красу,
                елегантність та винтонченість. Свічка має 3 аромати на вибор,
                або може не мати його взагалі.
              </div>
              <div class="product-info-parametrs">
                <p><span class="info-parametrs-title">Склад: </span>віск</p>
                <p>
                  <span class="info-parametrs-title">Час горіння: </span>до 4
                  годин
                </p>
                <p><span class="info-parametrs-title">Висота: </span>20 см</p>
                <p><span class="info-parametrs-title">Вага: </span>300г</p>
              </div>
              <div class="product-info-buttons">
                <button class="product-buy-button">у кошик</button>
                <button class="product-favorite-button">
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
                </button>
              </div>
            </div>
          </div>
          <div class="similar-products">
            <h2 class="similar-products-title">Інші товари</h2>
            <div class="product-cards-row">
              @foreach ($otherProducts as $otherProduct)
                <div class="product-card" data-product-id="{{ $otherProduct->id }}">
                  <a href="{{ route('product', ['id' => $otherProduct->id]) }}">
                    <div class="product-card-img">
                      @if (isset($otherProduct->image))
                        <img src="{{ asset('img/' . $otherProduct->image) }}" />
                      @else
                        <img src="{{ asset('img/bodycard.jpg') }}" />
                      @endif
                    </div>
                    <div class="product-card-content">
                      <h5 class="product-card-title">{{ $otherProduct->name }}</h5>
                      <p class="product-card-description">
                        {{ $otherProduct->description }}
                      </p>
                      <span class="product-card-price">{{ $otherProduct->price }} ₴</span>
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
          <div class="goonbtn-container">
            <a href="{{ route('store') }}"><button class="product-page-goonbtn">дивитися далі</button></a>
          </div>
        </div>
      </div>
      @include('layouts.like')
      @include('layouts.cart')
      @include('layouts.footer')
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/favorite.js') }}"></script>
  <script src="{{ asset('js/cart.js') }}"></script>
  <script src="{{ asset('js/header.js') }}"></script>
  <script src="{{ asset('js/dropdown.js') }}"></script>
</html>
