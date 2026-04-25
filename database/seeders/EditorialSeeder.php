<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Editorial;

class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Editorial::create([
            'name' => 'penguin',
            'direction' => 'calleradnom'
        ]);

        Editorial::create([
            'name' => 'centauro',
            'direction' => 'callerandom2'
        ]);*/

        $editorials = [
            ['name' => 'Penguin Random House', 'direction' => 'EE.UU'],
            ['name' => 'HarperCollins', 'direction' => 'EE.UU'],
            ['name' => 'Simon & Schuster', 'direction' => 'EE.UU'],
            ['name' => 'Hachette Livre', 'direction' => 'Francia'],
            ['name' => 'Macmillan Publishers', 'direction' => 'Reino Unido'],
            ['name' => 'Planeta', 'direction' => 'España'],
            ['name' => 'Anaya', 'direction' => 'España'],
            ['name' => 'Alfaguara', 'direction' => 'España'],
            ['name' => 'Salamandra', 'direction' => 'España'],
            ['name' => 'Debolsillo', 'direction' => 'España'],
        ];

        foreach ($editorials as $editorial) {
            Editorial::create($editorial);
        }
    }
}
