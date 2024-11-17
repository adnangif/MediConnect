<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;
    protected $primaryKey = 'prescription_id';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'prescription_date',
        'prescription',
        'prescription_file',
    ];

    public function medicines(): HasMany
    {
        return $this->hasMany(Medicine::class, 'prescription_id');
    }
}
