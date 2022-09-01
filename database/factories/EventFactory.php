<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'user_id' => User::factory(),
                'title' => fake()->title,
                'status' =>fake()->randomElement(["published","private","public"]),
                'description' => fake()->text,
                'start_date' =>fake()->dateTimeThisDecade,
                'end_date' =>fake()->dateTimeThisDecade,
        ];
    }
}
