<?php

namespace Database\Seeders;

use App\Models\RecyclingParticipant;
use Illuminate\Database\Seeder;

class RecyclingParticipantSeeder extends Seeder
{
    public function run(): void
    {
        RecyclingParticipant::factory(10)->create();
    }
}
