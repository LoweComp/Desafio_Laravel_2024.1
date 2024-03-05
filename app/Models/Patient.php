<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Patient extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'address',
        'phone',
        'cpf',
        'blood_type',
        'photo',
        'health_plan_id'
    ];

    public function healthplan()
    {
        return $this->belongsTo(HealthPlan::class, 'health_plan_id');
    }
}
