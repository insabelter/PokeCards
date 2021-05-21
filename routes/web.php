<?php

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

Route::get('grading', function () {
    return view('pages.grading');
})->name('grading');

Route::get('marketplace', function () {
    return view('pages.trading.marketplace');
})->name('marketplace');

Route::get('offers', function () {
    return view('pages.trading.offers');
})->name('offers');

Route::get('wiki', function () {
    return view('pages.wiki');
})->name('wiki');

Route::get('login', function () {
    return view('pages.account.login');
})->name('login');

Route::get('profile', function () {
    return view('pages.account.profile');
})->name('profile');
