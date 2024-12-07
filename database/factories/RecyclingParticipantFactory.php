<?php

namespace Database\Factories;

use App\Models\RecyclingParticipant;
use App\Models\RecyclingEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecyclingParticipantFactory extends Factory
{
    protected $model = RecyclingParticipant::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'event_id' => RecyclingEvent::factory(),
            'notes' => $this->faker->sentence(),
            'count' => $this->faker->numberBetween(1, 100),
        ];
    }
}
