<?php

namespace App\Models;

use App\Http\Traits\UpdatableAndCreateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vital extends Model
{
    use HasFactory;
    use UpdatableAndCreateable;

    protected $fillable = [
        'systolic_B_P',
        'diastolic_B_P',
        'temperature',
        'weight',
        'height',
        'bmi',
        'respiratory',
        'heart_rate',
        'urine_output',
        'blood_sugar_f',
        'bloog_sugar_r',
        'spo_2',
        'avpu',
        'trauma',
        'mobility',
        'oxygen_supplementation',
        'comment',
        'patient_id',
        'patient_visit_id',
        'user_id', // Doctor's id
        'created_by_id',
        'updated_by_id',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function patient_visit(): BelongsTo
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id', 'id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }
}
