<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController;

// Rute untuk tampilan login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::get('getitems', [itemController::class, 'getData'])->name('items.getData');
Route::get('pdf/exportPdfI/{id}', [TransactionController::class, 'exportPdfI'])->name('pdf/exportPdfI');
Route::get('pdf/exportPdfT', [TransactionController::class, 'exportPdf'])->name('pdf/exportPdfT');
Route::get('getItems', [ItemController::class, 'getData'])->name('Item.getData');

// Rute untuk login dan action login
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Rute home, action logout, dan item
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::resource('items', ItemController::class)->middleware('auth');
Route::post('/items/{item}/add-stock', [ItemController::class, 'addStock'])->name('items.addStock')->middleware('auth');
Route::post('/pay', [HomeController::class, 'pay'])->name('pay')->middleware('auth');

// Rute transactions dan profit dengan middleware auth
Route::get('/transactions', [TransactionController::class, 'index'])->name('transaksi')->middleware('auth');
Route::get('/profit', [ProfitController::class, 'index'])->name('profit')->middleware('auth');

Auth::routes();
