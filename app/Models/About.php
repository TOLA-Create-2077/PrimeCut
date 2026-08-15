<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'eyebrow',
        'title',
        'highlight_title',
        'description_one',
        'description_two',
        'badge_year',
        'badge_text',
        'image_one',
        'image_two',
    ];
}