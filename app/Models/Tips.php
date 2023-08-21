<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    use HasFactory;

    public $table = "tips";

    protected $fillable = [
        "tips_category_id",
        "date",
        "title",
        "content",
        "creator",
    ];

    public function tips_category()
    {
        return $this->belongsTo(TipsCategory::class, "tips_category_id", "id");
    }
}
