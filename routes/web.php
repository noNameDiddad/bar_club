<?php

use App\Http\Controllers\EmulateController;
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

Route::get('/', [GeneralController::class, 'mainPage'])->name('main_page');
Route::get('/instructions', [GeneralController::class, 'getInstructions'])->name('instructions');
Route::get('/settings', [GeneralController::class, 'outputSettings'])->name('open_settings');
Route::get('/to_main_menu', [GeneralController::class, 'toMainMenu'])->name('to_main_menu');
Route::get('/exit', [GeneralController::class, 'exit'])->name('exit');
Route::get('/exit_and_delete', [GeneralController::class, 'exit_and_delete'])->name('exit_and_delete');

Route::get('/start', [EmulateController::class, 'start'])->name('start');
Route::get('/next_step', [EmulateController::class, 'nextStep'])->name('next_step');
Route::get('/set_limit', [EmulateController::class, 'setLimit'])->name('set_limit');
Route::get('/emulator', [EmulateController::class, 'actionEmulator'])->name('action_emulator');

Route::resource('/firstname', FirstNameController::class);
Route::resource('/lastname', LastNameController::class);
Route::resource('/genre', GenreController::class);
Route::resource('/person', PersonController::class);
