<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\UserTypes;
use App\Enums\DoctorSpecializations;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get user IDs that are already associated with doctors
        $forbidden_ids = Doctor::where('user_id', '!=', null)->pluck('user_id')->toArray();
        
        // Try to find an existing user with the role 'doctor' and not in the forbidden list
        $user = User::where('role', UserTypes::DOCTOR->value)
                    ->whereNotIn('id', $forbidden_ids)
                    ->inRandomOrder()
                    ->first();
        
        // If no suitable user is found, create a new user with the doctor role
        if (!$user) {
            $user = User::factory()->create([
                'role' => UserTypes::DOCTOR->value,
                'password' => Hash::make('password'), // Example password, update as needed
            ]);
        }

        return [
            'user_id' => $user->id,
            'name' => $this->faker->name(),
            'specialization' => $this->faker->randomElement(DoctorSpecializations::toArray()),
            'experience' => $this->faker->sentence(),
            'contact' => $this->faker->phoneNumber(),
            'fee' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
