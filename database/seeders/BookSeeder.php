<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Book::create([
            'title' => 'Example',
            'genre' => 'Lore ipsum.',
            'book_language' => 'Lore ipsum dolor set aimet.'
        ]);

        Book::create([
            'title' => 'Example',
            'genre' => 'Lore ipsum.',
            'book_language' => 'Lore ipsum dolor set aimet.'
        ]);

        Book::create([
            'title' => 'Example',
            'genre' => 'Lore ipsum.',
            'book_language' => 'Lore ipsum dolor set aimet.'
        ]);*/

        Book::factory()->count(150)->create();
    }
}
