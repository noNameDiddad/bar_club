<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main_page.css') }}">

    <title>Main Page</title>
</head>
<body>
<div class="block-menu">
    <a href="{{ route('open_emulator') }}"><p>START</p></a>
    <a href="{{ route('open_settings') }}"><p>SETTINGS</p></a>
</div>
<div class="rights">
    <p>© all rights reserved</p>
    <p>powered by Daniil Shvecov</p>
</div>
</body>
</html>
