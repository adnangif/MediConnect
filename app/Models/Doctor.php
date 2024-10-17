<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\Debugbar\Facades\Debugbar;

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
