<?php

namespace App\Http\Controllers;

use App\Models\Emulator;
use App\Models\FavoriteGenre;
use App\Models\Genre;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmulateController extends Controller
{
    public function actionEmulator()
    {
        if (session()->get('limit')) {
            $genres = Genre::all();
            $emulator = Emulator::all();
            $persons = session()->get('persons');
            $genre_now = session()->get('genre_now');

            return view('emulator', [
                'genres' => $genres,
                'emulator' => $emulator,
                'persons' => $persons,
                'genre_now' => $genre_now
            ]);
        } else {
            session()->flush();
            foreach (FavoriteGenre::all() as $favorite_genre) {
                $favorite_genre->delete();
            }
            $genres = Genre::all();
            $persons = Person::inRandomOrder()
                ->distinct()
                ->get();
            $persons = $this->setGenres($persons, $genres);
            for ($i = 0; $i < count($persons); $i++) {
                $emulator = new Emulator();
                $emulator->id_person = $persons[$i]->id;
                $emulator->hours = 4;
                $emulator->status = 'entrance';

                $emulator->save();
            }
            $emulator = Emulator::all();
            return view('emulator', [
                'genres' => $genres,
                'emulator' => $emulator,
                'persons' => $persons,
                'genre_now' => null
            ]);
        }
    }

    public function start()
    {
        $genres = Genre::all();
        $genre = $genres[rand(0, count($genres) - 1)];
        $persons = session()->get('persons');
        $genre_now = session()->get('genre_now');
        $limit = session()->get('limit');

        $this->setEmulatorData($genre, $persons, $genre_now, $limit);

        session()->put('genre_now', $genre->genre);
        session()->put('action', 'step');

        return redirect()->route('action_emulator');
    }

    public function nextStep(Request $genre)
    {
        $persons = session()->get('persons');
        $genre_now = session()->get('genre_now');
        $limit = session()->get('limit');

        $this->setEmulatorData($genre, $persons, $genre_now, $limit);

        session()->put('genre_now', $genre->genre);
        session()->put('action', 'step');

        return redirect()->route('action_emulator');
    }

    public function setLimit(Request $limit)
    {
        session()->put('action', 'start');
        session()->put('limit', $limit->limit);
        return redirect()->back();
    }

    public function setGenres($persons, $genres)
    {
        $amount_genres = count($genres);

        foreach ($persons as $person) {
            $favorite_genres = [];
            $check_rand = [];
            $for_length = rand(1, $amount_genres);
            for ($i = 0; $i < $for_length; $i++) {
                $j = rand(0, $amount_genres - 1);
                $skipped = false;
                foreach ($check_rand as $check) {
                    if ($check == $j) {
                        $skipped = true;
                    } else {
                        $skipped = false;
                    }
                }

                if ($skipped == false) {
                    array_push($check_rand, $j);
                    array_push($favorite_genres, $genres[$j]->genre);
                    $favorite_genre = new FavoriteGenre();
                    $favorite_genre->id_person = $person->id;
                    $favorite_genre->id_genre = $genres[$j]->id;

                    $favorite_genre->save();
                }
            }
            $person->favorite_genres = $favorite_genres;
        }
        session()->put('persons', $persons);
        return $persons;
    }

    public function setEmulatorData($genre, $persons, $genre_now, $limit)
    {
        $emulator = Emulator::all();
        $genre_next = $genre->genre;
        $i = 0;
        foreach ($emulator as $emulation) {
            if ($i < $limit)
            {
                $hours = $emulation->hours;
                $status = $emulation->status;
                $id_person = $emulation->id_person;
                $person = null;
                foreach ($persons as $item) {
                    if ($item->id == $id_person) {
                        $person = $item;
                    }
                }
                $hours = $this->getHoursOfPerson($status, $hours);
                $status = $this->getStatusOfPerson($genre_next, $genre_now, $person, $hours, $status);

                if ($status == 'bar' || $status == 'dance') {
                    $i ++;
                }

                $emulation->status = $status;
                $emulation->hours = $hours;

                $emulation->update();
            }
        }
        $this->moveQueue();
        session()->put('genre_now', $genre_next);
    }

    public function getStatusOfPerson($genre_next, $genre_now, $person, $hours, $status)
    {
        if ($hours == 0) {
            $status = 'on_exit';
        } elseif ($hours == -1) {
            $status = 'exiting';
        } else {
            foreach ($person->favorite_genres as $genre) {
                if ($genre_next == $genre) {
                    $status = 'dance';
                    break;
                } elseif ($genre_next != $genre) {
                    $status = 'bar';
                }
            }
        }
        return $status;
    }

    public function getHoursOfPerson($status, $hours)
    {
        switch ($status) {
            case 'entrance':
                break;
            case 'bar':
                $hours -= 1;
                break;
            case 'dance':
                $hours -= 2;
                break;
            case 'on_exit':
                $hours = -1;
                break;
        }
        return $hours;
    }

    public function moveQueue()
    {
        $emulator = Emulator::all();
        foreach ($emulator as $emulation) {
            $id_person = $emulation->id_person;
            $status = $emulation->status;
            if ($status == 'exiting') {
                $emulation->delete();

                $emulation = new Emulator();
                $emulation->id_person = $id_person;
                $emulation->hours = 4;
                $emulation->status = 'entrance';

                $emulation->save();
            }
        }
    }
}
