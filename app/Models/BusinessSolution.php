<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSolution extends Model
{
    protected $fillable = ['icon_svg', 'title', 'description', 'sort_order'];
}