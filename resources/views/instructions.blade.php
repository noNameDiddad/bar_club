<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/css/instructions.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <title>Setting</title>
</head>
<body>
<div class="block-instruction">
    <h1>Инструкция</h1>
    <p>Для полноценной эмуляции вам потребуется создать начальные данные в настройках.
        Заполните поля значений 'first names', 'last names' и 'genres' хотя бы <span class="bold">пятью</span>
        значениями.
        <br>Произведение количеств значений полей 'first names' и 'last names'
        составляют максимальное количество уникальных персонажей в эмуляции.
        <br>Значение 'genres' определяет количество жанров в эмуляции.
        <br><br>Эмуляция заключается в показе бара с произвольным количеством посетителей с любимыми жанрами. В баре играет
        музыка и сравнивается с любимыми жанрами персонажей. Если проигрываемый жанр является любимым у одного из
        персонажей, то он идёт на танцпол, если же нет, то он идёт в бар.</p>
    <a href="{{ route('open_settings') }}">ПЕРЕЙТИ К НАСТРОЙКАМ</a>
    <a href="{{ route('main_page') }}">ПЕРЕЙТИ В ГЛАВНОЕ МЕНЮ</a>
</div>
</body>
</html>
