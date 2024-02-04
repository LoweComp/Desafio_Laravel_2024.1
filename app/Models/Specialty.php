<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $fillable = [
        'name',
        'description',
        'value'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
