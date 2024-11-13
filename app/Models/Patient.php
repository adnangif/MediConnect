<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['age', 'user_id', 'name', 'gender', 'contact', 'address'];

    protected $primaryKey = 'patient_id';

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'patient_id');
    }
}
