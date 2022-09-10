<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/', [DashboardController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/login', [HomeController::class, 'loginSubmit'])->name('login.submit');
Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');

Route::get('/user/details/{id}', [DashboardController::class, 'Userdetails'])->name('user.details');
Route::get('/user/rider/{id}', [DashboardController::class, 'DeleteUser'])->name('user.delete');
