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
            //'id' => 2,
            'name' => 'Marc',
            'last_name' => 'Alvarez',
            'email' => 'marcalvarezruiz9@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',

        ]);

        User::create([
            //'id' => 2,
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',

        ]);

        /*User::create([
            'id' => 2,
            'name' => 'Pedro',
            'last_name' => 'Ruiz',
            'email' => 'hola@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',

        ]);*/
    }
}
