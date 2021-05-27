<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradingController;
use App\Http\Controllers\WikiController;
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
Route::get('marketplace', [TradingController::class,'marketplace']) -> name("marketplace");
Route::get('offers', [TradingController::class,'offers']) -> name("offers");
Route::post('offers', [TradingController::class,'newOffer']);

// Wiki -----------------------------------
Route::get('wiki', [WikiController::class,'index']) -> name("wiki");

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


