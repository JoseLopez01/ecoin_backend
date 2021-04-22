<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
*/
class UserType extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_type_id';

    protected $fillable = [
        'description',
        'is_active'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_type_id', 'user_type_id');
    }

    public function format()
    {
        return [
            'description' => $this->description,
            'isactive' => $this->is_active,
            'usertypeid' => $this->user_type_id
        ];
    }
}
