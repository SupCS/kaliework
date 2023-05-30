<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>KalieSoap&Candle</title>
</head>
<body>
    <div class="wrapper">
        @include('layouts.header')
        <div class="main">
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <a href="{{ route('store') }}">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="{{ asset('img/sliderimage.png') }}" style="width: 100%" />
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="{{ asset('img/slider2.jpg') }}" style="width: 100%" />
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="{{ asset('img/slider1.jpg') }}" style="width: 100%" />
                    </div>
                </a>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)"><img class="arrow" src="{{ asset('img/back.svg') }}"></a>
                <a class="next" onclick="plusSlides(1)"><img class="arrow" src="{{ asset('img/forward.svg') }}"></a>

                <!-- The dots/circles -->
                <div class="dot-container">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
            <div class="tiles">
                <div class="container">
                    <ul class="tiles-list">
                        <li><img src="{{ asset('img/candletile.svg') }}" id="tile1" /></li>
                        <li class="tile">
                            <img src="{{ asset('img/ecotile.svg') }}" id="tile2" />
                        </li>
                        <li class="tile">
                            <img src="{{ asset('img/heartstile.svg') }}" id="tile3" />
                        </li>
                        <li class="tile">
                            <img src="{{ asset('img/soaptile.svg') }}" id="tile4" />
                        </li>
                        <li class="tile">
                            <img src="{{ asset('img/timetile.svg') }}" id="tile5" />
                        </li>
                        <li class="tile">
                            <img src="{{ asset('img/delivertile.svg') }}" id="tile6" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container" id="collection-banner-container">
                <div class="collection-banner-rectangle">
                    <div class="collection-banner-text">
                        <h2>valentine's collection</h2>
                        <h1>Обери подарунок своїй половинці</h1>
                        <p>Створіть кастомну свічку з будь-яким надписом та обирайте один з понад 25 різних ароматів для своїх коханих</p>
                        <div class="collection-banner-button-container">
                            <a href="{{ route('store') }}">
                                <button class="collection-banner-button">Замовити свічку</button>
                            </a>
                        </div>
                    </div>
                    <div class="collection-banner-img">
                        <img src="{{ asset('img/collectionbanner.jpg') }}" alt="collection banner image" />
                    </div>
                </div>
            </div>
            <div class="container" id="collection-tiles-container">
                <div class="collection-tiles-block">
                    <div class="collection-tiles-head">
                        <h1>Обирайте свою колекцію</h1>
                        <p>Нами було розроблено 4 унікальні колекції на будь-який привід</p>
                    </div>
                    <div class="collection-tiles">
                        <div class="collection-tiles-item">
                            <img src="{{ asset('img/housecollectionpic.jpg') }}" alt="collection" />
                            <h3>house</h3>
                        </div>
                        <div class="collection-tiles-item">
                            <img src="{{ asset('img/bodycollectionpic.jpg') }}" alt="collection" />
                            <h3>body</h3>
                        </div>
                        <div class="collection-tiles-item">
                            <img src="{{ asset('img/valentinescollectionpic.jpg') }}" alt="collection" />
                            <h3>valentine's</h3>
                        </div>
                        <div class="collection-tiles-item">
                            <img src="{{ asset('img/friendshipcollectionpic.jpg') }}" alt="collection" />
                            <h3>friendship</h3>
                        </div>
                    </div>
                    <div class="collection-tiles-button-container">
                        <a href="{{ route('store') }}">
                            <button class="collection-tiles-button">Замовити свічку</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="create-own-block">
                <div class="container">
                    <div class="create-own-text">
                        <h1>Бажаєте створити свою кастомну свічку?</h1>
                        <p>Просто оберіть колір свічки, аромат, надпис та фітиль з усіх варіантів! Понад 1000 унікальних поєднань - знайдіть свою ідеальну свічку!</p>
                        <a href="{{ route('store') }}">
                            <button class="create-own-button">Хочу створити свічку</button>
                        </a>
                    </div>
                    <div class="create-own-img">
                        <img src="{{ asset('img/createown.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="container" id="soap-tiles-container">
                <div class="soap-tiles-block">
                    <div class="soap-tiles-head">
                        <h1>Оберіть ароматне мило</h1>
                        <p>Понад 50 різних форм, видів та ароматів мила в асортименті</p>
                    </div>
                    <div class="soap-tiles">
                        <div class="soap-tiles-item">
                            <img src="{{ asset('img/soaparomaspic.jpg') }}" alt="soap collection" />
                            <h3>аромати</h3>
                        </div>
                        <div class="soap-tiles-item">
                            <img src="{{ asset('img/soapkidspic.jpg') }}" alt="soap collection" />
                            <h3>для дітей</h3>
                        </div>
                        <div class="soap-tiles-item">
                            <img src="{{ asset('img/soapcollectionspic.jpg') }}" alt="soap collection" />
                            <h3>колекції</h3>
                        </div>
                        <div class="soap-tiles-item">
                            <img src="{{ asset('img/soapformspic.jpg') }}" alt="soap collection" />
                            <h3>форми</h3>
                        </div>
                    </div>
                    <div class="soap-tiles-button-container">
                        <a href="{{ route('store') }}">
                            <button class="soap-tiles-button">Замовити мило</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="about-us-block" id="about-us">
                <div class="container">
                    <div class="about-us-img"></div>
                    <div class="about-us-text">
                        <h2 class="about-us-main">ПРО БРЕНД</h2>
                        <h1 class="about-us-name">KalieSoap&KalieCandle</h1>
                        <div class="columns">
                            <p class="about-us-1">Крафтовий бренд свічок та мила, створений у 2023 році студентом КПІ в якості бізнес-проекту для однієї з дисциплін. Ми створюємо свічки з натуральних продуктів, таких як соєві та кокосові воски, ефірні масла, природні ароматизатори та інші. Ми робимо все задля створення цікавих колекцій з неповторними ароматами</p>
                            <p class="about-us-2">Цікаві дизайни та приємні аромати наших продуктів завоювали серця сотень клієнтів та стали доволі популярними у соціальних мережах, таких як інстаграм, фейсбук і т.д.</p>
                            <p class="about-us-3">Найкращі аромасвічки та мило ручної роботи в Україні вже чекають на вас! Переходьте до нашого магазину та переконайтесь у цьому самі!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
</body>
<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/slider.js') }}"></script>
</html>
