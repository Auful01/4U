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


    /**
     * Get the quiz associated with the QuizAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }
}
