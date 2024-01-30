<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Patient extends Model
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
