<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
      'shop_id',
      'name',
      'description',
      'is_active'
    ];

    protected $primaryKey = 'reward_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'shop_id');
    }

    public function price()
    {
        return $this->hasOne(Price::class, 'reward_id', 'reward_id');
    }

    public function format()
    {
        return [
            'shopid' => $this->shop_id,
            'name' => $this->name,
            'description' => $this->description,
            'isactive' => $this->is_active
        ];
    }
}
