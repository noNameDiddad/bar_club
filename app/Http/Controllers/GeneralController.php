<?php

namespace App\Http\Controllers;

use App\Models\Emulator;
use App\Models\FavoriteGenre;
use App\Models\FirstName;
use App\Models\LastName;
use App\Models\Genre;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function mainPage()
    {
        return view('main_page', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'genres' => Genre::all()
        ]);
    }
    public function getInstructions()
    {
        return view('instructions', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'genres' => Genre::all()
        ]);
    }

    public function outputSettings()
    {
        return view('settings.main_setting', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'genres' => Genre::all()
        ]);
    }

    public function toMainMenu()
    {
        if (session()->get('changed')){
            $first_names = FirstName::all();
            $last_names = LastName::all();

            $first_names_count = count($first_names);
            $last_names_count = count($last_names);

            if ($first_names_count != 0 && $last_names_count != 0) {
                foreach (Person::all() as $person) {
                    $person->delete();
                }
                for ($i = 0; $i < $first_names_count; $i++) {
                    for ($j = 0; $j < $last_names_count; $j++) {

                        $person = new Person();
                        $person->first_name = $first_names[$i]->first_name;
                        $person->last_name = $last_names[$j]->last_name;

                        $person->save();
                    }
                }
            }
            session()->flush();
        }
        return redirect()->route('main_page');
    }

    public function exit()
    {
        return redirect()->route('main_page');
    }

    public function exit_and_delete()
    {
        session()->flush();
        foreach (FavoriteGenre::all() as $f_genre) {
            $f_genre->delete();
        }
        foreach (Emulator::all() as $emulation) {
            $emulation->delete();
        }
        return redirect()->route('main_page');
    }

    public function test()
    {
        echo FavoriteGenre::where('id_person', 15)->get();
        dd(session()->all());

    }
}
