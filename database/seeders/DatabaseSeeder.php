<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\ReviewTableSeeder;
use Database\Seeders\BookingTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            BookableTableSeeder::class,
            BookingTableSeeder::class,
            ReviewTableSeeder::class
        ]);
    }
}
