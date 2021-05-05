<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverableStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'is_active'
    ];

    public function deliverables()
    {
        return $this->hasMany(Deliverable::class, 'status_id', 'status_id');
    }
}
