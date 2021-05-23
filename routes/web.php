<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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
    return view('pages.start');
})->name('start');

// Trading -----------------------------------
Route::get('marketplace', function () {
    return view('pages.trading.marketplace');
})->name('marketplace');
Route::get('offers', function () {
    return view('pages.trading.offers');
})->name('offers');

// Wiki -----------------------------------
Route::get('wiki', function () {
    return view('pages.wiki');
})->name('wiki');

// Grading -----------------------------------
Route::get('grading', function () {
    return view('pages.grading');
})->name('grading');

// Account -----------------------------------
//Login
Route::get('login', [LoginController::class,'index']) -> name("login");
Route::post('login', [LoginController::class,'login']);

//Profile
Route::get('profile', [ProfileController::class,'index']) -> name("profile");
Route::post('profile', [ProfileController::class,'edit']);

//All routes that are important for the authentication are generated
Auth::routes();

// Login succesful -----------------------------------
Route::get('successful', function () {
    return view('pages.account.login_successful');
})->name('successful');
