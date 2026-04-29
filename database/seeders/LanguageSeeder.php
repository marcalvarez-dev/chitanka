<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create(['name' => 'Castellano']);
        Language::create(['name' => 'Catalán']);
        Language::create(['name' => 'Inglés']);
        Language::create(['name' => 'Francés']);
        Language::create(['name' => 'Ruso']);
        Language::create(['name' => 'Alemán']);
        Language::create(['name' => 'Italiano']);
        Language::create(['name' => 'Ucraniano']);
        Language::create(['name' => 'Chino']);
        Language::create(['name' => 'Griego']);
        Language::create(['name' => 'Portugués']);
    }
}
