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

    public function format()
    {
        return [
            'courseid' => $this->course_id,
            'userid' => $this->user_id,
            'isactive' => $this->is_active
        ];
    }
}
