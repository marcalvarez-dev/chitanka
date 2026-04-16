<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /*BookSeeder::class,
            UserSeeder::class,
            AddressSeeder::class,
            EditorialSeeder::class,
            OrderSeeder::class,
            EditionSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class*/
            AuthorSeeder::class,
            EditionSeeder::class,
        ]);
    }
}
