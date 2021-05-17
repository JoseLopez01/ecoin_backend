<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class StudentCourse extends Model
{
    use HasFactory;

    protected $fillable = [
      'course_id',
      'user_id',
      'is_active'
    ];

    protected $primaryKey = ['course_id', 'user_id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function format()
    {
        return [
            'courseid' => $this->course_id,
            'userid' => $this->user_id,
            'isactive' => $this->is_active
        ];
    }
}
