<?php

namespace Database\Seeders;

use App\Models\RecyclingEvent;
use Illuminate\Database\Seeder;

class RecyclingEventSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 10 recycling events
        RecyclingEvent::factory(10)->create();
    }
}
