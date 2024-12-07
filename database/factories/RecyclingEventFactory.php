<?php

namespace Database\Factories;

use App\Models\RecyclingEvent;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecyclingEventFactory extends Factory
{
    protected $model = RecyclingEvent::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'category_id' => Category::get()->random()->id,
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
