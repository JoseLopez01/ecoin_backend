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

    public function schedules()
    {
        return $this->hasMany(CourseSchedule::class, 'week_day_id', 'week_day_id');
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
