<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => 'makanan'],
            ['type' => 'minuman'],
            ['type' => 'lainnya'],
        ];

        DB::table('types')->insert($types);
    }
}
