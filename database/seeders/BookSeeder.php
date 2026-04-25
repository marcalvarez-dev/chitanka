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

        $books = [
            ['title' => 'Don Quijote de la Mancha', 'genre' => 'Novela'],
            ['title' => 'Cien años de soledad', 'genre' => 'Realismo'],
            ['title' => '1984', 'genre' => 'Distopía'],
            ['title' => 'El principito', 'genre' => 'Fábula'],
            ['title' => 'Crimen y castigo', 'genre' => 'Drama'],
            ['title' => 'Orgullo y prejuicio', 'genre' => 'Romance'],
            ['title' => 'Drácula', 'genre' => 'Terror'],
            ['title' => 'Frankenstein', 'genre' => 'Terror'],
            ['title' => 'El gran Gatsby', 'genre' => 'Drama'],
            ['title' => 'Fahrenheit 451', 'genre' => 'Distopía'],
            ['title' => 'Un mundo feliz', 'genre' => 'Distopía'],
            ['title' => 'El señor de los anillos', 'genre' => 'Fantasía'],
            ['title' => 'El hobbit', 'genre' => 'Fantasía'],
            ['title' => 'Harry Potter y la piedra filosofal', 'genre' => 'Fantasía'],
            ['title' => 'Juego de tronos', 'genre' => 'Fantasía'],
            ['title' => 'Los juegos del hambre', 'genre' => 'Distopía'],
            ['title' => 'El código Da Vinci', 'genre' => 'Misterio'],
            ['title' => 'La sombra del viento', 'genre' => 'Drama'],
            ['title' => 'La catedral del mar', 'genre' => 'Histórico'],
            ['title' => 'Los pilares de la Tierra', 'genre' => 'Histórico'],
            ['title' => 'It', 'genre' => 'Terror'],
            ['title' => 'El resplandor', 'genre' => 'Terror'],
            ['title' => 'La carretera', 'genre' => 'Drama'],
            ['title' => 'El alquimista', 'genre' => 'Fábula'],
            ['title' => 'Ensayo sobre la ceguera', 'genre' => 'Drama'],
            ['title' => 'El nombre de la rosa', 'genre' => 'Misterio'],
            ['title' => 'Rayuela', 'genre' => 'Experimental'],
            ['title' => 'Pedro Páramo', 'genre' => 'Realismo'],
            ['title' => 'La metamorfosis', 'genre' => 'Ficción'],
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
}
