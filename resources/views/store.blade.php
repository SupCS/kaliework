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
              <div class="filter">
                <h3 class="filter-price-title">Ціна</h3>
                <div class="filter-range-wrapper">
                  <div class="filter-range">
                    <div class="filter-range-scale">
                      <div class="filter-range-bar"></div>
                    </div>
                    <button class="filter-range-handle min"></button>
                    <button
                      class="filter-range-handle max"
                      style="left: 75%"
                    ></button>
                  </div>
                </div>

                <div class="filter-interval">
                  <label
                    ><input type="text" name="min-interval" value="0"
                  /></label>
                  <div class="filter-interval-line"></div>
                  <label
                    ><input type="text" name="max-interval" value="15000"
                  /></label>
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
              <div class="product-card">
              <a href="{{ route('product') }}">
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
              <a href="{{ route('product') }}">
                  <div class="product-card-img">
                    <img src="./img/bodymancard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Man</h5>
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
              <a href="{{ route('product') }}">
                  <div class="product-card-img">
                    <img src="./img/bodybuttcard.jpg" />
                  </div>
                  <div class="product-card-content">
                    <h5 class="product-card-title">Свічка BODY Woman</h5>
                    <p class="product-card-description">
                      У 3 ароматах на вибір
                    </p>
                    <span class="product-card-price">410 ₴</span>
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
                <a href="{{ route('product') }}">
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
        </div>
      </div>
    @include('layouts.footer')
</div>
</body>
</html>
