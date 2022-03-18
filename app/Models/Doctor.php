<?php

namespace App\Models;

// use App\Http\Traits\UpdatableAndCreateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    use HasFactory;
    // use UpdatableAndCreateable;

    protected $table = 'doctors';
    protected $primaryKey = 'id';
    // protected $password;
    protected $hidden = ['password'];

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'dob',
        'gender',
        'address',
        'country',
        'state',
        'city',
        'phone',
        'image',
        'short_bio',
        'status',
        // 'user_id',
        // 'specialist_id',
        // 'created_by_id',
        // 'updated_by_id',
    ];

    // public function specialist(): BelongsToMany
    // {
    //     return $this->belongsToMany(Specialist::class, 'specialist_id', 'id');
    // }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }
}
