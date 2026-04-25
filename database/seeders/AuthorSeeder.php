<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Miguel De Cervantes',
        ]);

        Author::create([
            'name' => 'Ernest Jünger',
        ]);

        Author::create([
            'name' => 'Homero',
        ]);

        Author::create([
            'name' => 'George Orwell',
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
        ]);

        Author::create([
            'name' => 'Gabriel García Márquez',
        ]);

        Author::create([
            'name' => 'Jane Austen',
        ]);

        Author::create([
            'name' => 'Fyodor Dostoevsky',
        ]);

        Author::create([
            'name' => 'Stephen King',
        ]);

        Author::create([
            'name' => 'Dan Brown',
        ]);

        /*DB::table('author_book')->insert([
            'author_id' => 1,
            'book_id' => 1,
        ]);

        DB::table('author_book')->insert([
            'author_id' => 1,
            'book_id' => 2,
        ]);

        DB::table('author_book')->insert([
            'author_id' => 2,
            'book_id' => 3,
        ]);

        DB::table('author_book')->insert([
            'author_id' => 2,
            'book_id' => 4,
        ]);*/
    }
}
