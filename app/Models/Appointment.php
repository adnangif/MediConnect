<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'message',
        'date',
        'time',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function consultation(): HasOne
    {
        return $this->hasOne(Consultation::class, 'consultation_id');
    }

    public function prescription(): HasOne
    {
        return $this->hasOne(Prescription::class, 'prescription_id');
    }

    public static function createAppointment(array $validated)
    {
        try {
            DB::beginTransaction();
            $appointment = Appointment::create($validated);
            $consultation = Consultation::create([
                'appointment_id' => $appointment->appointment_id
            ]);

            $prescription = Prescription::create([
                'appointment_id' => $appointment->appointment_id
            ]);

            DB::commit();
            return $appointment;
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
