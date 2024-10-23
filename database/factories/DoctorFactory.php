<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserTypes;
use App\Enums\DoctorSpecializations;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $forbidden_ids = Doctor::where('user_id', '!=', null)->pluck('user_id')->toArray();
        return [
            'user_id' => User::where('role', UserTypes::DOCTOR->value)
                            ->whereNotIn('id', $forbidden_ids)
                            ->inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'specialization' => fake()->randomElement(DoctorSpecializations::toArray()),
            'experience' => fake()->sentence(),
            'contact' => fake()->phoneNumber(),
            'fee' => fake()->numberBetween(100, 1000),
            
        ];
    }
}
