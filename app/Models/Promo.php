<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    public $table = "promo";

    protected $fillable = [
        "category_id",
        "title",
        "value",
        "description",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
