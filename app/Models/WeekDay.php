<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class WeekDay extends Model
{
    use HasFactory;

    protected $fillable = [
      'description',
      'is_active'
    ];

    protected $primaryKey = 'week_day_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_schedules', 'week_day_id', 'course_id');
    }

    public function format()
    {
        return [
            'description' => $this->description,
            'isactive' => $this->is_active,
            'weekdayid' => $this->week_day_id
        ];
    }
}
