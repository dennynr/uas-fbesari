<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TypeSeeder::class);
        $this->call(ItemSeeder::class);
        // Uncomment the following line if you want to seed the user table
        // \App\Models\User::factory(10)->create();
    }
}
