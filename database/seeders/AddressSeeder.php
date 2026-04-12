<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'country' => 'spain',
            'province' => 'barcelona',
            'city' => 'esplugues',
            'postal_code' => '08950',
            'street' => 'tomas_breton',
            'apartment_number' => 'ent1',
            'number' => '1',
            'user_id' => 1
        ]);

        Address::create([
            'country' => 'spain',
            'province' => 'barcelona',
            'city' => 'sanes',
            'postal_code' => '08635',
            'street' => 'gleva',
            'apartment_number' => '3',
            'number' => '2',
            'user_id' => 1
        ]);

        Address::create([
            'country' => 'ukraine',
            'province' => 'kyiv',
            'city' => 'kiyiv',
            'postal_code' => '1234',
            'street' => 'maidan',
            'apartment_number' => '1',
            'number' => '3',
            'user_id' => 2
        ]);
    }
}
