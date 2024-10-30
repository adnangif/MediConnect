<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = 'doctor_id';
    protected $fillable = [
        'user_id',
        'name',
        'specialization',
        'experience',
        'contact',
        'fee',
        'cur_work',
        'is_approved',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public static function getDoctorByNameSpecialization(string|null $name, string|null $specialization)
    {
        $doctors = Doctor::query();
        if ($name) {
            $doctors = $doctors->where('name', 'LIKE', "%{$name}%");
        }
        if($specialization){
            $doctors = $doctors->where('specialization', $specialization);
        }

        Debugbar::info($doctors->get());

        return $doctors->get();
    }
}
