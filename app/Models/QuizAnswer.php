<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    public $table = "quiz_answer";

    protected $fillable = [
        "quiz_id",
        "answer",
        "point",
    ];
}
