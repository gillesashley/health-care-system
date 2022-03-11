<?php

namespace App\Models;

use App\Http\Traits\UpdatableAndCreateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;
    use UpdatableAndCreateable;

    protected $fillable = [
        'medicine_code',
        'medicine_name',
        'medicine_price',
        'medicine_profit',
        'description',
        'available_qty',
        'alert_qty',
        'status',
        'purchase',
        'created_by_id',
        'updated_by_id',
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
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
