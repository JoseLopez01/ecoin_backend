<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_header_id',
        'reward_id'
    ];

    public function sale()
    {
        return $this->belongsTo(SaleHeader::class, 'sale_header_id', 'sale_header_id');
    }
}
