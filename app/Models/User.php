<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @mixin Builder
*/
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_type_id',
        'semester_id',
        'phone_number',
        'email',
        'password',
        'ecoins'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'user_id';

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id', 'user_type_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'semester_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'user_id', 'course_id');
    }

    public function format() {
        return [
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'usertypeid' => $this->user_type_id,
            'semesterid' => $this->semester_id,
            'phonenumber' => $this->phone_number,
            'email' => $this->email,
        ];
    }

    public function formatAsStudent()
    {
        return [
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'usertypeid' => $this->user_type_id,
            'semesterid' => $this->semester_id,
            'phonenumber' => $this->phone_number,
            'fullname' => $this->first_name." ".$this->last_name,
            'email' => $this->email,
            'semester' => [
                'semesterid' => $this->semester->semester_id,
                'description' => $this->semester->description
            ]
        ];
    }
}
