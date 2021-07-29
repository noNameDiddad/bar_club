<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/css/emulator.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <script src="{{ asset("js/script.js") }}"></script>

    <title>Bar Club</title>
</head>
<body>


@if(session()->get('limit') == null)
    <div class="count">
        <form action="{{ route('set_limit') }}" method="get">
            @csrf
            <p>Введите количество мест в клубе</p>
            <input type="text" name="limit">
            <button type="submit"> Подтвердить</button>
        </form>
    </div>
@else
    <div class="count_person">
        <p class="">Количество мест в клубе {{ session()->get('limit') }}</p>
    </div>
@endif

<div class="club">
    <div class="all_without_music">
        <div class="upper_face_control">
            <p class="place">Entrance</p>
            <div class="scrollable face_control value">
                @if(count($emulator) == 0)
                    @foreach($persons as $person)
                        <div class="person">
                            <p>{{ $person->first_name." ".$person->last_name}}</p>
                            <div class="person_data">
                                <p>Любимые жанры:
                                    @foreach ($person->favorite_genres as $genre)
                                        {{ $genre }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($emulator as $emulation)
                        @if($emulation->status == "entrance")
                            @foreach($persons as $person)
                                @if($emulation->id_person == $person->id)
                                    <div class="person">
                                        <p>{{ $person->first_name." ".$person->last_name}}</p>
                                        <div class="person_data">
                                            <p>Любимые жанры:
                                                @foreach ($person->favorite_genres as $genre)
                                                    {{ $genre }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="bar_with_dance">
            <div class="upper_bar">
                <p class="place">Bar</p>
                <div class="scrollable bar value">
                    @foreach($emulator as $emulation)
                        @if($emulation->status == "bar")
                            @foreach($persons as $person)
                                @if($emulation->id_person == $person->id)
                                    <div class="person">
                                        <p>{{ $person->first_name." ".$person->last_name}}</p>
                                        <div class="person_data">
                                            <p>Любимые жанры:
                                                @foreach ($person->favorite_genres as $genre)
                                                    {{ $genre }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="upper_dance">
                <p class="place">Dance place</p>
                <div class="scrollable dance value">
                    @foreach($emulator as $emulation)
                        @if($emulation->status == "dance")
                            @foreach($persons as $person)
                                @if($emulation->id_person == $person->id)
                                    <div class="person">
                                        <p>{{ $person->first_name." ".$person->last_name}}</p>
                                        <div class="person_data">
                                            <p>Любимые жанры:
                                                @foreach ($person->favorite_genres as $genre)
                                                    {{ $genre }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="upper_exiting">
            <p class="place">Exit</p>
            <div class="scrollable exiting value">
                @foreach($emulator as $emulation)
                    @if($emulation->status == "on_exit")
                        @foreach($persons as $person)
                            @if($emulation->id_person == $person->id)
                                <div class="person">
                                    <p>{{ $person->first_name." ".$person->last_name}}</p>
                                    <div class="person_data">
                                        <p>Любимые жанры:
                                            @foreach ($person->favorite_genres as $genre)
                                                {{ $genre }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="upper_music">
        <div class="nickelodion">
            <p class="place">Nickelodeon</p>
            <div class="music value">
                @if(session()->get('genre_now'))
                    <form action="{{ route('next_step') }}" method="get" class="genre_form">
                        @csrf
                        <p class="inline">Текущий жанр:</p>
                        <select name="genre">
                            @foreach($genres as $genre)
                                @if( $genre_now == $genre->genre)
                                    <option selected value="{{$genre->genre}}">{{$genre->genre}}</option>
                                @else
                                    <option value="{{$genre->genre}}">{{$genre->genre}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="form-step-button">
                            @if(session()->get('action') == 'step')
                                <button type="submit">Следующий ход</button>
                            @endif
                        </div>
                    </form>

                @endif
                <div class="start-button">
                    @if(session()->get('action') == 'start')
                        <a href="{{'start'}}">Старт</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="exit">
    <a href="{{ route('exit') }}">Выйти</a>
    <a href="{{ route('exit_and_delete') }}">Выйти и удалить список посетителей</a>
</div>
</body>
</html>
