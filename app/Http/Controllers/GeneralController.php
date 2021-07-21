<?php

namespace App\Http\Controllers;

use App\Models\FirstName;
use App\Models\LastName;
use App\Models\Music;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function outputSettings()
    {
        return view('settings.main_setting', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'tracks' => Music::all()
        ]);
    }

    public function startEmulator()
    {
        return view('emulator')->with('status', 'none');
    }

    public function getData()
    {
        return response([
            'tracks' => Music::all(),
            'persons' => Person::all()
        ]);
    }

    public function getPersons(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'count' => 'required|digits_between:0,30',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $first_names = FirstName::all();
        $last_names = LastName::all();
        $tracks = Music::all();

        $count = $request->count;
        for ($i = 0; $i <= $count; $i++) {

            $person = new Person();
            $person->first_name_id = $first_names[$this->getRandom(count($first_names)-1)]->id ;
            $person->last_name_id = $last_names[$this->getRandom(count($last_names)-1)]->id ;
            $person->music_id = $tracks[$this->getRandom(count($tracks)-1)]->id;

            $person->save();
        }
        session()->put('person', $count);
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
