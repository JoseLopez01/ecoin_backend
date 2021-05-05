<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverableFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'deliverable_id',
        'name',
        'address',
        'is_active'
    ];

    public function deliverable()
    {
        return $this->belongsTo(Deliverable::class, 'deliverable_id', 'deliverable_id');
    }
}
