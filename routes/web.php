<?php

use App\Http\Controllers\FirstNameController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LastNameController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main_page');
});

Route::get('/settings', [GeneralController::class, 'outputSettings'])->name('open_settings');

Route::resource('/firstname', FirstNameController::class);
Route::resource('/lastname', LastNameController::class);
Route::resource('/music', MusicController::class);
Route::resource('/person', PersonController::class);
