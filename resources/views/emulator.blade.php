<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/css/emulator.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <script src="{{ asset("js/script.js") }}"></script>

    <title>Bar Club</title>
</head>
<body>
<div class="play-buttons">
    <img class="control-button play" id="play_btn" onclick="startEmulation()" src="{{ asset('images/play_btn.png') }}" alt="">
    <img class="control-button pause" id="pause_btn" onclick="stopEmulation()" src="{{ asset('images/pause_btn.png') }}" alt="">
</div>

<div class="count">
    @if(session()->get('person') == null)
    <form action="{{ route('getPersons') }}">
        <p>Введите количество людей</p>
        <input type="text" name="count">
        <button type="submit"> Подтвердить </button>
    </form>
    @else
        <p>Количество людей {{ session()->get('person') }}</p>
        <script>
            tracks = {!! json_encode($tracks) !!};
            persons = {!! json_encode($persons) !!};
            openStart();
        </script>
    @endif
</div>
<div class="music" id="music">

</div>
<div class="bar" id="bar">

</div>
<div class="dance" id="dance">

</div>
<div class="exit" id="exit">
    <a href="{{ route('exit') }}">Выйти</a>
    <a href="{{ route('exit_and_delete') }}">Выйти и удалить список посетителей</a>
</div>
</body>
</html>
