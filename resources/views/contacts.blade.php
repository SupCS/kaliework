<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>KalieSoap&Candle - Контакти</title>
</head>
<body class=contacts-page>
    @include('layouts.header')

<div class="main">
  <div class="container">
    <div class="contacts-container">
      <div class="contacts-text-container">
        <h1>Контакти</h1>
        <p id="contacts-page-number">+380500445612</p>
        <p>Питання щодо магазину та замовлень: kaliestore@gmail.com</p>
        <p>
          Питання щодо партнерства, співпраці, контрактів, корпоративних
          замовлень: supezbiz@gmail.com
        </p>
      </div>
        <div class="contacts-form-container">
        <h2>Є запитання? Ми на них швидко відповімо!</h2>
        <form method="post" action="{{ route('form.process') }}">
            @csrf
            <input type="text" name="username" placeholder="Ваше ім'я" required>
            <input type="email" name="email" placeholder="Ваш e-mail" required>
            <input type="text" name="question" placeholder="Ваше питання" required>
            <div class="form-safety">
            <img src="./img/lock-icon.svg" />
            <p>Особисті дані ніколи не буде передано стороннім лицям</p>
            </div>
            <input type="submit" value="Відправити">
        </form>
        </div>
    </div>
  </div>
</div>

    @include('layouts.footer')

    <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>
