<?php

namespace Database\Factories;

use App\Models\Bot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bot>
 */
class BotFactory extends Factory
{
    protected $model = Bot::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomNumber(4, true),
            'duration' => $this->faker->numberBetween(21, 72),
            'features' => json_encode(['runs daily','pauses when investment stops','rolls over']),
            'multiplier' => $this->faker->numberBetween(3,9),
        ];
    }
}
