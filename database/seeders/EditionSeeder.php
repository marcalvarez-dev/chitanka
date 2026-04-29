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

        // Edition::factory()->count(150)->create();

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

        /* DB::table('edition_order')->insert([
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
        ]);*/

        $books = \App\Models\Book::all();
        $editorials = \App\Models\Editorial::pluck('id')->toArray();

        $formats = ['Tapa dura', 'Tapa blanda', 'Ebook'];
        $languages = \App\Models\Language::pluck('id')->toArray();


        $covers = [
            1 => 'book1.jpg',
            2 => 'book2.jpg',
            3 => 'book3.jpg',
            4 => 'book4.jpg',
            5 => 'book5.jpg',
            6 => 'book6.jpg',
            7 => 'book7.jpg',
            8 => 'book8.jpg',
            9 => 'book9.jpg',
            10 => 'book10.jpg',
            11 => 'book11.jpg',
            12 => 'book12.jpg',
            13 => 'book13.jpg',
            14 => 'book14.jpg',
            15 => 'book15.jpg',
            16 => 'book16.jpg',
            17 => 'book17.jpg',
            18 => 'book18.jpg',
            19 => 'book19.jpg',


        ];

        foreach ($books as $book) {

            $cover = $covers[$book->id] ?? 'book1.jpg';


            \App\Models\Edition::create([
                'book_id' => $book->id,
                'editorial_id' => $editorials[array_rand($editorials)],
                'isbn' => fake()->unique()->numerify('#############'),
                'title' => $book->title . ' - Edición 1',
                'language_id' => $languages[array_rand($languages)],
                'publication_date' => fake()->date(),
                'price' => rand(10, 35),
                'stock' => rand(0, 50),
                'format' => $formats[array_rand($formats)],
                'synopsis' => fake()->paragraph(3),
                'cover' => $cover,
            ]);
        }
    }
}
