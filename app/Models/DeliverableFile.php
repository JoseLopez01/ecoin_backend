<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
*/
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

    public function format()
    {
        return [
            'deliverableid' => $this->deliverable_id,
            'name' => $this->name,
            'address' => $this->address,
            'isactive' => $this->is_active
        ];
    }
}
