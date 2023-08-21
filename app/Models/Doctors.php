<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    public $table = "doctors";

    protected $fillable = [
        'name',
        'photo',
        'specialist',
        'experience',
        'description',
        'rating',
        'practice_days',
        'practice_time',
    ];
}
