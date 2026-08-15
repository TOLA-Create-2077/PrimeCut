<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityStep extends Model
{
    protected $fillable = ['step_number', 'title', 'description'];
}