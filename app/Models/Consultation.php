<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $primaryKey = 'consultation_id';
    protected $fillable = [
        'doctor_sdp',
        'patient_sdp',
        'appointment_id',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
