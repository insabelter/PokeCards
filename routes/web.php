<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

// Footer -----------------------------------
Route::get('about', [FooterController::class,'about']) -> name("about");
Route::get('privacy', [FooterController::class,'privacy']) -> name("privacy");

// Trading -----------------------------------
Route::get('marketplace', [TradingController::class,'marketplace']) -> name("marketplace");
Route::get('watchlist', [TradingController::class,'watchlist']) -> name("watchlist");
Route::get('offers', [TradingController::class,'offers']) -> name("offers");
Route::get('offers/{cardId}', [TradingController::class,'offers']) -> name("offers");
Route::post('offers', [TradingController::class,'newOffer']);
Route::post('offers/delete', [TradingController::class,'deleteOffer']);

// wiki -----------------------------------
Route::get('card-search', [WikiController::class,'card_search']) -> name("card-search");
//Route::get('set-explorer', [WikiController::class,'set_explorer']) -> name("set-explorer");
Route::get('set-explorer/{setId}', [WikiController::class,'set_explorer']) -> name("set-explorer-sets");

// Grading -----------------------------------
Route::get('guide', function () {
    return view('pages.grading.guide');
})->name('guide');

Route::get('psa', function () {
    return view('pages.grading.psa');
})->name('psa');

Route::get('egs', function () {
    return view('pages.grading.egs');
})->name('egs');




//All routes that are important for the authentication are generated
Auth::routes();

Auth::routes(['verify' => true]);

//Profile
Route::get('profile', [ProfileController::class,'index']) -> name("profile");
Route::get('verficationMail', [ProfileController::class,'sendVarificationMail']) -> name("verficationMail");
Route::post('profile/edit/{id}', [ProfileController::class,'edit'])->name('edit');
Route::post('/profile/delete/{id}', [ProfileController::class,'deleteAccount'])->name('deleteAccount');

//Admin
Route::get('admin', [AdminController::class,'index']) -> name("admin");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
