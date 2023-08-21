<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    public $table = "consultation";

    protected $fillable = [
        "doctor_id",
        "user_id",
        "category_id",
        "schedule",
        "complaints",
        "result",
        "status",
        "image",
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, "doctor_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
