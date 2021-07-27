<?php

namespace App\Http\Controllers;

use App\Models\FavoriteGenre;
use App\Models\FirstName;
use App\Models\LastName;
use App\Models\Genre;
use App\Models\Person;
use App\Models\ReadyPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function outputSettings()
    {
        return view('settings.main_setting', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'genres' => Genre::all()
        ]);
    }

    public function startEmulator()
    {
        return view('emulator',[
            'genres' => Genre::all(),
            'persons' => Person::all()
        ]);
    }

    public function getPersons(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'count' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $first_names = FirstName::all();
        $last_names = LastName::all();
        $genres = Genre::all();

        $count = $request->count;
        for ($i = 0; $i < $count; $i++) {

            $person = new Person();
            $person->first_name = $first_names[$this->getRandom(count($first_names)-1)]->first_name ;
            $person->last_name = $last_names[$this->getRandom(count($last_names)-1)]->last_name ;
            $person->music = $genres[$this->getRandom(count($genres)-1)]->genre;

            $person->save();
        }
        return redirect()->back();
    }

    public function exit()
    {
        return redirect()->route('main_page');
    }

    public function exit_and_delete()
    {
        session()->flush();
        foreach (Person::all() as $person)
        {
            $person->delete();
        }
        return redirect('/');
    }

    public function getRandom($max)
    {
        return rand(0,$max);
    }
}
