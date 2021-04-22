<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
*/
class Semester extends Model
{
    use HasFactory;

    protected $primaryKey = 'semester_id';

    protected $fillable = [
        'description',
        'is_active'
    ];

    public function format()
    {
        return [
            'description' => $this->description,
            'semesterid' => $this->semesterid,
            'isactive' => $this->is_active
        ];
    }
}
