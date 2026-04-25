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
            'name' => 'Miguel',
            'last_name' => 'De cervantes'
        ]);

        Author::create([
            'name' => 'Ernest',
            'last_name' => 'Junger'
        ]);


        Author::create([
            'name' => 'Homero',
            'last_name' => 'Desconocido'
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
