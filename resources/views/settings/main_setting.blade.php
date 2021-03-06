<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/css/main_setting.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <title>Setting</title>
</head>
<body class="background">
<div class="first_names block-setting">
    <div class="header">
        <h1>имя</h1>
        <div class="form">
            <form action="{{ route('firstname.store') }}" method="POST">
                @csrf
                <input type="text" name="first_name" id="">
                <button>+</button>
            </form>
        </div>
    </div>
    <div class="output">
        @foreach($first_names as $first_name)
            <form action="{{ route('firstname.destroy', $first_name->id) }}" method="post">
                @csrf
                @method('delete')
                <p class="outputed">{{ $first_name->first_name }}</p>
                <button>-</button>
            </form>
        @endforeach
    </div>
</div>
<div class="last_names block-setting">
    <div class="header">
        <h1>фамилия</h1>
        <div class="form">
            <form action="{{ route('lastname.store') }}" method="post">
                @csrf
                <input type="text" name="last_name" id="">
                <button>+</button>
            </form>
        </div>
    </div>
    <div class="output">
        @foreach($last_names as $last_name)
            <form action="{{ route('lastname.destroy', $last_name->id) }}" method="post">
                @csrf
                @method('delete')
                <p class="outputed">{{ $last_name->last_name }}</p>
                <button>-</button>
            </form>
        @endforeach
    </div>
</div>
<div class="tracks block-setting">
    <div class="header">
        <h1>жанр</h1>
        <div class="form">
            <form action="{{ route('genre.store') }}" method="post">
                @csrf
                <input type="text" name="genre" id="">
                <button>+</button>
            </form>
        </div>
    </div>
    <div class="output">
        @foreach($genres as $genre)
            <form action="{{ route('genre.destroy', $genre->id) }}" method="post">
                @csrf
                @method('delete')
                <p class="outputed">{{ $genre->genre }}</p>
                <button>-</button>
            </form>
        @endforeach
    </div>
</div>
<div class="explanation block-setting">
    <div class="header">
        <h1>описание</h1>
    </div>
    <div class="output">
        <p>Добавьте данные для корректной работы эмулятора. Данные добавляются нажатием кнопки + и удаляются нажатием кнопки -.</p>
    </div>
    <div class="exit">
        <a href="{{ route('to_main_menu') }}">В ГЛАВНОЕ МЕНЮ</a>
    </div>
</div>
</body>
</html>
