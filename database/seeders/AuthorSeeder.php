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
        Author::create(['name' => 'Miguel De Cervantes']);

        Author::create(['name' => 'Gabriel García Márquez']);

        Author::create(['name' => 'George Orwell']);

        Author::create(['name' => 'Antoine de Saint-Exupéry']);

        Author::create(['name' => 'Jane Austen']);

        Author::create(['name' => 'J.K. Rowling']);

        Author::create(['name' => 'J.R.R. Tolkien']);

        Author::create(['name' => 'Suzanne Collins']);

        Author::create(['name' => 'Paulo Coelho']);

        Author::create(['name' => 'Gabriel García Márquez']);

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
