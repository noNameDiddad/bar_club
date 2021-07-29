<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main_page.css') }}">

    <title>Главное меню</title>
</head>
<body>
<div class="block-menu">
    @if(count($first_names) < 5 || count($last_names) < 5 || count($genres) < 3)
        <a href="{{ route('instructions') }}"><p>ИНСТРУКЦИЯ</p></a>
    @else
        <a href="{{ route('action_emulator') }}"><p>СТАРТ</p></a>
    @endif
    <a href="{{ route('open_settings') }}"><p>НАСТРОЙКИ</p></a>
</div>
<div class="rights">
    <p>© все права защищены</p>
    <p>разработал Даниил Швецов</p>
</div>
</body>
</html>
