<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
*/
class CourseSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
      'course_id',
      'week_day_id',
      'is_active'
    ];

    protected $primaryKey = ['course_id', 'week_day_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class, 'week_day_id', 'week_day_id');
    }
}
