<!DOCTYPE html>
<html lang="uk">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/product.css" />
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
          <div class="product-info">
            <div class="product-info-photo">
              <img src="./img/productwoman.jpg" />
            </div>
            <div class="product-info-main">
              <div class="product-info-head">
                <h1 class="product-info-name">Свічка BODY Woman</h1>
                <h1 class="product-info-price">820₴</h1>
              </div>
              <div class="product-color">
                <h3 class="product-info-title">Колір</h3>
                <ul class="color-pannel">
                  <li class="cp cp-fair active"></li>
                  <li class="cp cp-pink"></li>
                  <li class="cp cp-purple"></li>
                  <li class="cp cp-lightgreen"></li>
                  <li class="cp cp-red"></li>
                </ul>
              </div>
              <div class="product-wick">
                <h3 class="product-info-title">Фітиль</h3>
                <div class="dropdown">
                  <button onclick="myFunction1()" class="dropbtn">
                    <span class="dropbtn-text">Авто</span>
                  </button>
                  <div id="myDropdown1" class="dropdown-content">
                    <a href="#">Бавовняний</a>
                    <a href="#">Дерев'яний</a>
                  </div>
                </div>
              </div>
              <div class="product-fragnance">
                <h3 class="product-info-title">Аромат</h3>
                <div class="dropdown">
                  <button onclick="myFunction2()" class="dropbtn">
                    <span class="dropbtn-text">Немає</span>
                  </button>
                  <div id="myDropdown2" class="dropdown-content">
                    <a href="#">Немає</a>
                    <a href="#">Фіалка</a>
                    <a href="#">Яблуко</a>
                  </div>
                </div>
              </div>
              <div class="product-info-description">
                <span class="info-description-name">Свічка The Woman</span> -
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
                  <img src="./img/like.svg" />
                </button>
              </div>
            </div>
          </div>
          <div class="similar-products">
            <h2 class="similar-products-title">Схожі товари</h2>
            <div class="product-cards-row">
              <div class="product-card">
                <a href="./product.html">
                  <div class="product-card-img">
                    <img src="./img/bodycard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Woman</h5>
                    <p class="product-card-description">
                      У 3 ароматах на вибір
                    </p>
                    <span class="product-card-price">820 ₴</span>
                  </div>
                </a>
                <div class="heart-icon">
                  <img class="heart-icon-svg" src="./img/like.svg" />
                </div>
                <div class="cart-icon">
                  <img class="cart-icon-svg" src="./img/catricon.svg" />
                </div>
              </div>
              <div class="product-card">
                <a href="./product.html">
                  <div class="product-card-img">
                    <img src="./img/bodycard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Woman</h5>
                    <p class="product-card-description">
                      У 3 ароматах на вибір
                    </p>
                    <span class="product-card-price">820 ₴</span>
                  </div>
                </a>
                <div class="heart-icon">
                  <img class="heart-icon-svg" src="./img/like.svg" />
                </div>
                <div class="cart-icon">
                  <img class="cart-icon-svg" src="./img/catricon.svg" />
                </div>
              </div>
              <div class="product-card">
                <a href="./product.html">
                  <div class="product-card-img">
                    <img src="./img/bodycard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Woman</h5>
                    <p class="product-card-description">
                      У 3 ароматах на вибір
                    </p>
                    <span class="product-card-price">820 ₴</span>
                  </div>
                </a>
                <div class="heart-icon">
                  <img class="heart-icon-svg" src="./img/like.svg" />
                </div>
                <div class="cart-icon">
                  <img class="cart-icon-svg" src="./img/catricon.svg" />
                </div>
              </div>
              <div class="product-card">
                <a href="./product.html">
                  <div class="product-card-img">
                    <img src="./img/bodycard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Woman</h5>
                    <p class="product-card-description">
                      У 3 ароматах на вибір
                    </p>
                    <span class="product-card-price">820 ₴</span>
                  </div>
                </a>
                <div class="heart-icon">
                  <img class="heart-icon-svg" src="./img/like.svg" />
                </div>
                <div class="cart-icon">
                  <img class="cart-icon-svg" src="./img/catricon.svg" />
                </div>
              </div>
            </div>
          </div>
          <div class="goonbtn-container">
            <a href="{{ route('store') }}"><button class="product-page-goonbtn">дивитися далі</button></a>
          </div>
        </div>
      </div>
      @include('layouts.cart')
      @include('layouts.footer')
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/cart.js') }}"></script>
  <script src="{{ asset('js/colors.js') }}"></script>
  <script src="{{ asset('js/header.js') }}"></script>
  <script src="{{ asset('js/dropdown.js') }}"></script>
</html>
