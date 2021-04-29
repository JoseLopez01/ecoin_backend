<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
      'course_id',
      'week_day_id',
      'is_active'
    ];
}
