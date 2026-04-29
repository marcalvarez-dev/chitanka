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

        //Book::factory()->count(150)->create();

        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        $languages = \App\Models\Language::all();

        $books = [
            ['title' => 'Don Quijote de la Mancha', 'genre' => 'Novela'],
            ['title' => 'Cien años de soledad', 'genre' => 'Realismo'],
            ['title' => '1984', 'genre' => 'Distopía'],
            ['title' => 'El principito', 'genre' => 'Fábula'],
            ['title' => 'Orgullo y prejuicio', 'genre' => 'Romance'],
            ['title' => 'Harry Potter y la piedra filosofal', 'genre' => 'Fantasía'],
            ['title' => 'El señor de los anillos: La comunidad del anillo', 'genre' => 'Fantasía'],
            ['title' => 'Los juegos del hambre', 'genre' => 'Distopía'],
            ['title' => 'El alquimista', 'genre' => 'Novela'],
            ['title' => 'Crónica de una muerte anunciada', 'genre' => 'Realismo'],

        ];

        foreach ($books as $i => $bookData) {

            $author = $authors[$i % $authors->count()];

            $category = $categories
                ->where('name', $bookData['genre'])
                ->first();

            \App\Models\Book::create([
                'title' => $bookData['title'],
                'category_id' => $category->id,
                'author_id' => $author->id,
            ]);
        }
    }
}
