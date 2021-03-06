<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'description',
        'until',
        'since',
        'is_active',
        'ecoins'
    ];

    protected $primaryKey = 'activity_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'class_id', 'class_id');
    }

    public function deliverables()
    {
        return $this->hasMany(Deliverable::class, 'deliverable_id', 'deliverable_id');
    }

    public function format()
    {
        return [
            'activityid' => $this->activity_id,
            'courseid' => $this->course_id,
            'name' => $this->name,
            'description' => $this->description,
            'until' => $this->until,
            'since' => $this->since,
            'isactive' => $this->is_active,
            'ecoins' => $this->ecoins
        ];
    }
}
