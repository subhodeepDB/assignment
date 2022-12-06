<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
    return redirect(route('login'));
});

Route::get('login', function () {
    return view('login');
});

Route::post('login', [LoginController::class, 'doLogin'])->name('login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', function() {
    return view('register');
});

Route::post('register', [UserController::class, 'store'])->name('register.store');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::post('dashboard', [DashboardController::class, 'store'])->name('dashboard.store')->middleware('auth');
Route::get('seller-details/{id}', [DashboardController::class, 'show'])->middleware('auth');