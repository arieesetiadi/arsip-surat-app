<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JenisPenggunaSeeder::class);
        $this->call(PenggunaSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
