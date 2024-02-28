<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Authenticatable
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
        'photo',
        'working_period',
        'CRM',
        'specialty_id'
    ];

    public function specialty()
    {
        return $this->hasOne(Specialty::class);
    }

    public function surgery()
    {
        return $this->hasMany(Surgery::class);
    }

}
