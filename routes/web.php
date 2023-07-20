<?php

use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('item', [SellerController::class, 'item'])->name('item');
Route::get('profit', [SellerController::class, 'profit'])->name('profit');
Route::get('transaksi', [SellerController::class, 'transaksi'])->name('transaksi');



