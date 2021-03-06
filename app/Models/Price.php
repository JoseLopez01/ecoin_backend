<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Price extends Model
{
    use HasFactory;

    protected $fillable = [
      'reward_id',
      'price',
      'is_active'
    ];

    protected $primaryKey = 'price_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function reward()
    {
        return $this->belongsTo(Reward::class, 'reward_id', 'reward_id');
    }

    public function format()
    {
        return [
            'rewardid' => $this->reward_id,
            'price' => $this->price,
            'description' => $this->description,
            'isactive' => $this->is_active
        ];
    }
}
