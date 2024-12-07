<?php

namespace Database\Seeders;

use App\Models\RecyclingParticipantItem;
use Illuminate\Database\Seeder;

class RecyclingParticipantItemSeeder extends Seeder
{
    public function run(): void
    {
        RecyclingParticipantItem::factory(20)->create();
    }
}
