<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->create();
        
        Patient::factory()
            ->count(5)
            ->create();
        
        Doctor::factory()
            ->count(5)
            ->create();
        
        Notification::factory()
            ->count(50)
            ->create();
    }
}
