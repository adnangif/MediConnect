<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public static function createUser(array $validated)
    {
        try {
            DB::beginTransaction();
            $user_info = [
                'email' => $validated['email'],
                'password' => $validated['password'],
            ];
            $user = parent::create($user_info);

            $patiend_info = [
                'user_id' => $user->id,
                'name' => $validated['name'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
            ];
            $patient = Patient::create($patiend_info);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
