<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_header_id',
        'reward_id'
    ];

    protected $primaryKey = 'sale_detail_id';

    public function sale()
    {
        return $this->belongsTo(SaleHeader::class, 'sale_header_id', 'sale_header_id');
    }

    public function format()
    {
        return [
            'saleheaderid' => $this->sale_header_id,
            'rewardid' => $this->reward_id
        ];
    }
}
