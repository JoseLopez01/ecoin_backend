<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class SaleStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'is_active'
    ];

    protected $primaryKey = 'status_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function sales()
    {
        return $this->hasMany(SaleHeader::class, 'status_id', 'status_id');
    }

    public function format()
    {
        return [
            'description' => $this->description,
            'isactive' => $this->is_active
        ];
    }
}
