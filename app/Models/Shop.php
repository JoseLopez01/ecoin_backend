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
      'class_id',
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
            'classid' => $this->class_id,
            'isactive' => $this->is_active
        ];
    }
}
