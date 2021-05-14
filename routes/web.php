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
    return view('main');
});

Route::get('grading', function () {
    return view('subpages.grading');
});

Route::get('trading', function () {
    return view('subpages.trading');
});

Route::get('wiki', function () {
    return view('subpages.wiki');
});

Route::get('profile', function () {
    return view('subpages.profile');
});
