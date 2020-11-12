<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::post('/search', [QuoteController::class, 'search'])->name('quote.search');
Route::get('/quotes', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/new', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/new', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/edit/{uuid}', [QuoteController::class, 'edit'])->name('quote.edit');
Route::post('/edit/{uuid}', [QuoteController::class, 'update'])->name('quote.update');
Route::delete('/edit/{uuid}', [QuoteController::class, 'destroy'])->name('quote.destroy');
Route::get('/{uuid}', [QuoteController::class, 'show'])->name('quote.show');
