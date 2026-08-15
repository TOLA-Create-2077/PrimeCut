<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'grade',
        'description',
        'image_path',
    ];

    public function categoryRecord()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }
}