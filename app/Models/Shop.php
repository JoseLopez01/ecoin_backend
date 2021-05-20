<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
      'course_id',
      'is_active'
    ];

    protected $primaryKey = 'shop_id';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class, 'shop_id', 'shop_id');
    }

    public function format()
    {
        return [
            'shopid' => $this->shop_id,
            'courseid' => $this->course_id,
            'isactive' => $this->is_active,
            'rewards' => $this->rewards->map(
                function ($reward)
                {
                    return [
                        'rewardid' => $reward->reward_id,
                        'shopid' => $reward->shop_id,
                        'name' => $reward->name,
                        'description' => $reward->description,
                        'isactive' => $reward->is_Active,
                        'price' => [
                            'priceid' => $reward->price->price_id,
                            'rewardid' => $reward->price->reward_id,
                            'price' => $reward->price->price,
                            'isactive' => $reward->price->is_active
                        ]
                    ];
                }
            )
        ];
    }
}
