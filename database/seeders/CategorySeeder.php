<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Novela',
            'Realismo',
            'Distopía',
            'Fábula',
            'Drama',
            'Romance',
            'Terror',
            'Fantasía',
            'Misterio',
            'Histórico',
            'Experimental',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name
            ]);
        }
    }
}
