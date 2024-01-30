<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthPlan extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'discount',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}

