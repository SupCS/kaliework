<!DOCTYPE html>
<html lang="uk">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/adress.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Де купити? KalieSoap&KalieCandle</title>
  </head>
  <body class="adress-page">
    <div class="wrapper">
      @include('layouts.header')

      <div class="main">
        <div class="container" id="map-text-container">
          <div class="map-wrapper">
            <div class="map-container">
              <div id="map"></div>
            </div>
          </div>
          <div class="text-wrapper">
            <div class="map-head-text">
              <h1>KalieSoap & KalieCandle в магазинах</h1>
              <p>
                Наразі ми маємо 3 фізичних магазини у місті Києві та два
                магазина у місті Суми. Для зручності, ви можете користуватися
                інтерактивною картою!
              </p>
            </div>
            <div class="map-text-kyiv">
              <h2>м. Київ, Україна</h2>
              <p>вул. Академіка Янгеля, 5</p>
              <p>вул. Політехнічна, 6 (каб. 314)</p>
              <p>проспект Перемоги, 24 (ТЦ “Plaza”, 2 поверх)</p>
            </div>
            <div class="map-text-sumy">
              <h2>м. Суми, Україна</h2>
              <p>проспект Михайла Лушпи, 10 (4 поверх)</p>
              <p>вул. Троїцька, 3</p>
            </div>
            <div class="map-text-amsterdam">
              <h2>м. Амстердам, Нідерланди</h2>
              <p>Скоро...</p>
            </div>
          </div>
        </div>
      </div>

      @include('layouts.footer')
    </div>
    <script src="{{ asset('js/header.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzROvaW2zeaCcyiK5UF3Vz4vlKMQZFprs&callback=initMap"></script>
    <script src="{{ asset('js/map.js') }}"></script>
  </body>
</html>
