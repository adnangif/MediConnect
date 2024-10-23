<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserTypes;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $forbidden_ids = Patient::where('user_id', '!=', null)->pluck('user_id')->toArray();
        return [
            'name' => fake()->name(),
            'user_id' => User::where('role', UserTypes::USER->value)
                            ->whereNotIn('id', $forbidden_ids)
                            ->inRandomOrder()->first()->id,
            'gender' => fake()->randomElement(['male', 'female']),
            'age' => fake()->numberBetween(1, 100),
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
        ];
    }
}
