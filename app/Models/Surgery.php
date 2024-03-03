<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'value',
        'patient_id',
        'doctor_id',
        'specialty_id'
    ];

    protected static function boot()
    {
        parent::boot();
        //End Dinâmico
        static::saving(function ($surgery) {
            if (!empty($surgery->start)) {
                $surgery->end = $surgery->start->copy()->addHours(2);
            }
        });
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function specialty()
    {
        return $this->BelongsTo(Specialty::class);
    }

}
