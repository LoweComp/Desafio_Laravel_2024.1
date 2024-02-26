<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Patient extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'blood_type',
        'photo',
        'health_plan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function healthplans()
    {
        return $this->hasOne(HealthPlan::class);
    }
}
