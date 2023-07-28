<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     // Nama tabel yang akan digunakan oleh model
     protected $table = 'transactions';

     // Kolom-kolom yang dapat diisi pada tabel
     protected $fillable = [
         'transaction_code',
         'items',
         'prices',
         'method',
         'date',
     ];
}
