<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Marc',
            'last_name' => 'Alvarez',
            'email' => 'hola@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',

        ]);

        User::create([
            'id' => 2,
            'name' => 'Pedro',
            'last_name' => 'Ruiz',
            'email' => 'adios@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',

        ]);
    }
}
