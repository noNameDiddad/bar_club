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
    <img class="control-button play" id="play_btn" onclick="startEmulation()" src="{{ asset('images/play_btn.png') }}"
         alt="">
    <img class="control-button pause" id="pause_btn" onclick="stopEmulation()" src="{{ asset('images/pause_btn.png') }}"
         alt="">
</div>

@if(session()->get('person') == null)
    <div class="count">
        <form action="{{ route('getPersons') }}">
            <p>Введите количество людей</p>
            <input type="text" name="count">
            <button type="submit"> Подтвердить</button>
        </form>
    </div>
@else
    <div class="count_person">
        <p class="">Количество людей {{ count($persons) }}</p>
    </div>
@endif

<div class="club">
    <div class="all_without_music">
        <div class="upper_face_control">
            <p class="place">Entrance</p>
            <div class="face_control value" id="face_control">
            </div>
        </div>
        <div class="bar_with_dance">
            <div class="upper_bar">
                <p class="place">Bar</p>
                <div class="bar value" id="bar">
                </div>
            </div>
            <div class="upper_dance">
                <p class="place">Dance place</p>
                <div class="dance value" id="dance">
                </div>
            </div>
        </div>
    </div>
    <div class="upper_music">
        <p class="place">Nickelodeon</p>
        <div class="music value" id="music">
        </div>
    </div>
</div>

<div class="exit" id="exit">
    <a href="{{ route('exit') }}">Выйти</a>
    <a href="{{ route('exit_and_delete') }}">Выйти и удалить список посетителей</a>
</div>
<script>
    tracks = {!! json_encode($tracks) !!};
    persons = {!! json_encode($persons) !!};
    openStart();
</script>
</body>
</html>
