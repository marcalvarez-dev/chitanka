<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\BookSeeder;
use Database\Seeders\EditorialSeeder;
use Database\Seeders\EditionSeeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //Presentacion
            UserSeeder::class,
            EditorialSeeder::class,
            BookSeeder::class,
            EditionSeeder::class,
            AuthorSeeder::class
        ]);
    }
}
