<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', UserTypes::USER->value)->inRandomOrder()->first()->id,
            'message' => fake()->sentence(),
            'is_read' => fake()->boolean(),
            'link' => '#',
        ];
    }
}
