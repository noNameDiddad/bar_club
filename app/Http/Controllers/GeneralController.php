<?php

namespace App\Http\Controllers;

use App\Models\FirstName;
use App\Models\LastName;
use App\Models\Music;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function outputSettings() {
        return view('settings.main_setting', [
            'first_names' => FirstName::all(),
            'last_names' => LastName::all(),
            'tracks' => Music::all()
        ]);
    }
}
