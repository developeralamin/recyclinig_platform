<?php

namespace Database\Factories;

use App\Models\RecyclingParticipantItem;
use App\Models\RecyclingParticipant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecyclingParticipantItemFactory extends Factory
{
    protected $model = RecyclingParticipantItem::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'participant_id' => RecyclingParticipant::factory(),
        ];
    }
}
