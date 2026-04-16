<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Edition;
use Illuminate\Support\Facades\DB;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Edition::create([
            'isbn' => 1233567891231,
            'title' => 'tronos',
            'language' => 'spanish',
            'publication_date' => fake()->date(),
            'price' => 10.2,
            'stock' => 50,
            'format' => 'ebook',
            'synopsis' => 'nose',
            'editorial_id' => 1,
            'book_id' => 1
        ]);

        Edition::create([
            'isbn' => 1244567891231,
            'title' => 'tronos',
            'language' => 'spanish',
            'publication_date' => fake()->date(),
            'price' => 10.2,
            'stock' => 50,
            'format' => 'ebook',
            'synopsis' => 'nose',
            'editorial_id' => 2,
            'book_id' => 2

        ]);

        Edition::create([
            'isbn' => 3234567891231,
            'title' => 'tronos',
            'language' => 'spanish',
            'publication_date' => fake()->date(),
            'price' => 10.2,
            'stock' => 50,
            'format' => 'ebook',
            'synopsis' => 'nose',
            'editorial_id' => 1,
            'book_id' => 3
        ]);*/

        DB::table('edition_order')->insert([
            'edition_id' => 1,
            'order_id' => 1,
            'quantity' => 5,
            'unitary_price' => 10.5,
        ]);

        DB::table('edition_order')->insert([
            'edition_id' => 2,
            'order_id' => 1,
            'quantity' => 5,
            'unitary_price' => 12.5,
        ]);

        DB::table('edition_order')->insert([
            'edition_id' => 2,
            'order_id' => 2,
            'quantity' => 1,
            'unitary_price' => 3.4,
        ]);
    }
}
