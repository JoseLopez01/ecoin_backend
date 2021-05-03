<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
      'shop_id',
      'name',
      'description',
      'is_active'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'shop_id');
    }

    public function price()
    {
        return $this->hasOne(Price::class, 'reward_id', 'reward_id');
    }
}
