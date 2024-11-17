<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Enums\UserTypes;
use App\Models\Notification;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\DoctorSpecializations;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()
        //     ->count(50)
        //     ->create();
        
        // Patient::factory()
        //     ->count(5)
        //     ->create();
        
        Doctor::factory()
            ->count(50)
            ->create();
        
        // Notification::factory()
        //     ->count(50)
        //     ->create();

        $user = User::create([
            'email' => 'user1@gmail.com',
            'password' => Hash::make('1234'),
            'role' => UserTypes::USER->value,
        ]);

        Patient::create([
            'user_id' => $user->id,
            'age' => 30,
            'name' => "John Doe",
            'gender' => 'male',
            'contact' => '0177123456',
            'address' => 'Khulna',
        ]);

        $doctor = User::create([
            'email' => 'doctor1@gmail.com',
            'password' => Hash::make('1234'),
            'role' => UserTypes::DOCTOR->value,
        ]);

        Doctor::create([
            'user_id' => $doctor->id,
            'name' => "Jane Alice",
            'specialization' => DoctorSpecializations::CARDIOLOGIST->value,
            'experience' => 5,
            'contact' => '0177123456',
            'fee' => 1000,
            
        ]);
    }
}
