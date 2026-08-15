<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $table = 'home_pages';

    protected $fillable = [
        'subtitle',
        'title_line_1',
        'title_highlight',
        'title_line_3',
        'description',

        // Old/local image path - keep for backward compatibility
        'hero_image',

        // Cloudinary
        'hero_image_url',
        'hero_image_public_id',

        'btn_explore_text',
        'btn_explore_url',
        'btn_contact_text',
        'btn_contact_url',
    ];
}