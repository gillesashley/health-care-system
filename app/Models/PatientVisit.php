<?php

namespace App\Models;

use App\Http\Traits\UpdatableAndCreateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientVisit extends Model
{
    use HasFactory;
    use UpdatableAndCreateable;

    protected $fillable = [
        'visit_no',
        'visit_type',
        'visit_date',
        'visit_status',
        'description',
        'patient_id',
        'user_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function patient(): HasMany
    {
        return $this->hasMany(Patient::class, 'patient_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
