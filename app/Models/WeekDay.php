<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    protected $fillable = [
      'description',
      'is_active'
    ];

    public function schedules()
    {
        return $this->hasMany(CourseSchedule::class, 'week_day_id', 'week_day_id');
    }
}
