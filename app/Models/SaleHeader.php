<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'user_id',
        'status_id',
        'sale_date'
    ];

    public function status()
    {
        return $this->belongsTo(SaleStatus::class, 'status_id', 'status_id');
    }

    public function details()
    {
        return $this->hasMany(SaleDetail::class, 'sale_header_id', 'sale_header_id');
    }
}
