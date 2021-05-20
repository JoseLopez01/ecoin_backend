<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'is_active'
    ];

    protected $primaryKey = 'course_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'student_courses', 'course_id', 'user_id');
    }

    public function weekDays()
    {
        return $this->belongsToMany(WeekDay::class, 'course_schedules', 'course_id', 'week_day_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class, 'course_id', 'course_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'course_id', 'course_id');
    }

    public function format()
    {
        return [
          'courseid' => $this->course_id,
          'userid' => $this->user_id,
          'name' => $this->name,
          'isactive' => $this->is_active,
          'users' => $this->users_count ?: 0,
          'weekdays' => $this->weekdays->map(function ($weekday) {
            return [
              'weekdayid' => $weekday->week_day_id,
              'isactive' => $weekday->is_active,
              'description' => $weekday->description,
              'courseid' => $weekday->pivot->course_id
            ];
          })
        ];
    }
}
