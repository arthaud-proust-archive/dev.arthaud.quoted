<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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





Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/me', [UserController::class, 'show'])->name('user.me');
    Route::get('/user/{hashid}', [UserController::class, 'show'])->name('user.show');
    Route::get('/me/quotes', [UserController::class, 'quotes'])->name('user.quotes');
    Route::get('/me/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/me/edit', [UserController::class, 'update'])->name('user.update');


    Route::get('/new', [QuoteController::class, 'create'])->name('quote.create');
    Route::post('/new', [QuoteController::class, 'store'])->name('quote.store');
    Route::get('/edit/{hashid}', [QuoteController::class, 'edit'])->name('quote.edit');
    Route::post('/edit/{hashid}', [QuoteController::class, 'update'])->name('quote.update');
    Route::delete('/edit/{hashid}', [QuoteController::class, 'destroy'])->name('quote.destroy');
});

Route::middleware(['role:admin'])->group(function() {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/{hashid}/role', [UserController::class, 'changeRole'])->name('user.role');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/legal', 'legal')->name('legal');
Route::view('/contribute', 'contribute')->name('contribute');
Route::post('/search', [QuoteController::class, 'search'])->name('quote.search');
Route::get('/quotes', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/{hashid}', [QuoteController::class, 'show'])->name('quote.show');

Route::view('/{a}/{e}', 'errors.404')->name('error.404');
Route::view('/{a}/{e}/{f}', 'errors.404')->name('error.404');
