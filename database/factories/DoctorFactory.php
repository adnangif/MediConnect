<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Doctor;
use App\Enums\UserTypes;
use App\Enums\DoctorSpecializations;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    // protected $model = Doctor::class;

    public function definition(): array
    {
        // Create or retrieve a user with the 'DOCTOR' role
        $user = User::factory()->doctor()->create();

        return [
            'user_id' => $user->id,
            'name' => $this->faker->name,            
            'specialization' => $this->faker->randomElement(DoctorSpecializations::toArray()),
            'experience' => $this->faker->numberBetween(1,15),
            'contact' => $this->faker->phoneNumber(),
            'fee' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
