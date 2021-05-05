<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        'status_id',
        'deliverable_date',
        'comments'
    ];

    public function status()
    {
        return $this->belongsTo(DeliverableStatus::class, 'status_id', 'status_id');
    }

    public function files()
    {
        return $this->hasMany(DeliverableFile::class, 'deliverable_id', 'deliverable_id');
    }
}
