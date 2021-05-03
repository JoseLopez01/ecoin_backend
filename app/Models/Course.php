<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'name',
      'is_active'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'student_courses', 'course_id', 'user_id');
    }

    public function schedules()
    {
        return $this->hasMany(CourseSchedule::class, 'course_id', 'course_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class, 'course_id', 'course_id');
    }
}
