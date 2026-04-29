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
            ['title' => 'Don Quijote de la Mancha', 'genre' => 'Novela', 'author' => 'Miguel De Cervantes'],
            ['title' => 'Cien años de soledad', 'genre' => 'Realismo', 'author' => 'Gabriel García Márquez'],
            ['title' => '1984', 'genre' => 'Distopía', 'author' => 'George Orwell'],
            ['title' => 'El principito', 'genre' => 'Fábula', 'author' => 'Antoine de Saint-Exupéry'],
            ['title' => 'Orgullo y prejuicio', 'genre' => 'Romance', 'author' => 'Jane Austen'],
            ['title' => 'Harry Potter y la piedra filosofal', 'genre' => 'Fantasía', 'author' => 'J.K. Rowling'],
            ['title' => 'El señor de los anillos: La comunidad del anillo', 'genre' => 'Fantasía', 'author' => 'J.R.R. Tolkien'],
            ['title' => 'Los juegos del hambre', 'genre' => 'Distopía', 'author' => 'Suzanne Collins'],
            ['title' => 'El alquimista', 'genre' => 'Novela', 'author' => 'Paulo Coelho'],
            ['title' => 'Crónica de una muerte anunciada', 'genre' => 'Realismo', 'author' => 'Gabriel García Márquez'],
            ['title' => 'Rayuela', 'genre' => 'Experimental', 'author' => 'Julio Cortázar'],
            ['title' => 'La sombra del viento', 'genre' => 'Misterio', 'author' => 'Carlos Ruiz Zafón'],
            ['title' => 'Fahrenheit 451', 'genre' => 'Distopía', 'author' => 'Ray Bradbury'],
            ['title' => 'Un mundo feliz', 'genre' => 'Distopía', 'author' => 'Aldous Huxley'],
            ['title' => 'El nombre del viento', 'genre' => 'Fantasía', 'author' => 'Patrick Rothfuss'],
            ['title' => 'Monstruos en el archivo', 'genre' => 'Terror', 'author' => 'Stephen King'],
            ['title' => 'Alas de sangre', 'genre' => 'Drama', 'author' => 'Rebecca Yarros'],
            ['title' => 'La llamada de Cthulhu', 'genre' => 'Terror', 'author' => 'H. P. Lovecraft'],
            ['title' => 'Los pilares de la tierra', 'genre' => 'Histórico', 'author' => 'Ken Follett'],
        ];

        foreach ($books as $i => $bookData) {

            $author = $authors->firstWhere('name', $bookData['author']);
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
