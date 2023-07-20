<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'code_item' => 'ITEM001',
                'name_item' => 'Nasi Goreng',
                'price' => 25000,
                'type_id' => 1,
                // Sesuaikan dengan id untuk tipe "makanan" pada tabel types
                'qty' => 50,
                'image' => 'nasi_goreng.jpg',
            ],
            [
                'code_item' => 'ITEM002',
                'name_item' => 'Es Teh Manis',
                'price' => 8000,
                'type_id' => 2,
                // Sesuaikan dengan id untuk tipe "minuman" pada tabel types
                'qty' => 100,
                'image' => 'es_teh.jpg',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        DB::table('items')->insert($items);
    }
}
