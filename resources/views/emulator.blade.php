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
    <script>
        getData();
    </script>
    <title>Bar Club</title>
</head>
<body>
<div class="play-buttons">
    <img class="control-button play" id="play_btn" onclick="startEmulation()" src="{{ asset('images/play_btn.png') }}" alt="">
    <img class="control-button pause" id="pause_btn" onclick="stopEmulation()" src="{{ asset('images/pause_btn.png') }}" alt="">
</div>
<div class="bar" id="bar">

</div>
<div class="dance" id="dance">

</div>
<div class="bufer" id="bufer">

</div>
</body>
</html>
