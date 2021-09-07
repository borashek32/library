<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title',
        'category_id',
        'text'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
