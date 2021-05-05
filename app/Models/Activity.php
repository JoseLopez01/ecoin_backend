<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'name',
        'description',
        'until',
        'since',
        'is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'class_id', 'class_id');
    }

    public function deliverables()
    {
        return $this->hasMany(Deliverable::class, 'deliverable_id', 'deliverable_id');
    }
}
