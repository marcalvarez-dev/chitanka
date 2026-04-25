<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'status' => 'way',
            'total_price' => 100,
            'date' => fake()->dateTime(),
            'address_id' => 1,
            'user_id' => 1
        ]);
    }
}
