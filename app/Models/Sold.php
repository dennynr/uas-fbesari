<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $table = 'sold';

    protected $fillable = [
        'name',
        'stock',
        'purchase_price',
        'selling_price',
        'date',
    ];

    // Tambahkan kode lain yang mungkin dibutuhkan untuk model ini
}
