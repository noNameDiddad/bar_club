<?php

use App\Http\Controllers\FirstNameController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LastNameController;
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
})->name('main_page');

Route::get('/settings', [GeneralController::class, 'outputSettings'])->name('open_settings');
Route::get('/emulator', [GeneralController::class, 'startEmulator'])->name('open_emulator');
Route::get('/exit', [GeneralController::class, 'exit'])->name('exit');
Route::get('/exit_and_delete', [GeneralController::class, 'exit_and_delete'])->name('exit_and_delete');
Route::post('/get_data', [GeneralController::class, 'getData']);
Route::get('/get_person', [GeneralController::class, 'getPersons'])->name('getPersons');



Route::resource('/firstname', FirstNameController::class);
Route::resource('/lastname', LastNameController::class);
Route::resource('/genre', GenreController::class);
Route::resource('/person', PersonController::class);
