<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('citizen');
Route::post('/citizens', [App\Http\Controllers\CitizenController::class, 'store'])->name('citizens.store');
Route::get('/citizens', [App\Http\Controllers\CitizenController::class, 'search'])->name('citizens.search');
Route::post('/searchcitizens', [App\Http\Controllers\CitizenController::class, 'searchCitizens'])->name('citizens.searchCitizens');
Route::get('/citizens/{citizen}', [App\Http\Controllers\CitizenController::class, 'show'])->name('citizens.show');
