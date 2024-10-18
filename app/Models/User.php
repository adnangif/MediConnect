<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'user_id');
    }

    public function doctor(): HasOne{
        return $this->hasOne(Doctor::class, 'user_id');
    }

    public function isUser(){
        return $this->role == UserTypes::USER->value;
    }

    public function isDoctor(){
        return $this->role == UserTypes::DOCTOR->value;
    }

    public function isAdmin(){
        return $this->role == UserTypes::ADMIN->value;
    }

    public static function createUser(array $validated)
    {
        try {
            DB::beginTransaction();
            $user_info = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role'],
            ];
            $user = User::create($user_info);

            $patient_info = [
                'user_id' => $user->id,
                'name' => $validated['name'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
            ];
            $patient = Patient::create($patient_info);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }

    public static function createDoctor(array $validated)
    {
        try {
            DB::beginTransaction();
            $user_info = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role'],
            ];

            $user = User::create($user_info);

            $doctor_info = [
                'user_id' => $user->id,
                'name' => $validated['name'],
                'specialization' => $validated['specialization'],
            ];
            $doctor = Doctor::create($doctor_info);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
