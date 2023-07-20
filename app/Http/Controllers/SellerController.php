<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function item()
    {

        return view('item');

    }
    public function profit()
    {

        return view('profit');

    }
    public function transaksi()
    {

        return view('transaksi');

    }
}
