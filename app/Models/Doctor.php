<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'working_period',
        'CRM',
        'specialty_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->hasOne(Specialty::class);
    }

    public function surgery()
    {
        return $this->hasMany(Surgery::class);
    }

}
