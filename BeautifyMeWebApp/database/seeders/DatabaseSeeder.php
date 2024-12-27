<?php

namespace Database\Seeders;

use App\Models\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'Facial Treatment',
            'description' => 'A relaxing and rejuvenating facial treatment.',
            'price' => 50.00,
        ]);

        Service::create([
            'name' => 'Hair Spa',
            'description' => 'A luxurious hair spa treatment.',
            'price' => 30.00,
        ]);
    }
}
