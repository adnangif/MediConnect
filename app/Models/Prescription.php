<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;
    protected $primaryKey = 'prescription_id';

    protected $fillable = [
        'appointment_id',
    ];

    public function medicines(): HasMany
    {
        return $this->hasMany(Medicine::class, 'prescription_id');
    }

    public function save_medicines($medicines)
    {
        try {
            DB::beginTransaction();

            $prev_medicines = $this->medicines()->get();
            
            foreach ($prev_medicines as $medicine) {
                $medicine->delete();
            }
            
            foreach ($medicines as $medicine) {
                Medicine::create([
                    'medicine_text' => $medicine,
                    'prescription_id' => $this->prescription_id,
                ]);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
