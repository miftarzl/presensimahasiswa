<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $table = 'students';

    protected $fillable = [
        'nama',
        'npm',
        'email',
        'password',
        'is_password_changed'
    ];

    protected $hidden = [
        'password',
    ];

    public function classes()
    {
        return $this->belongsToMany(
            ClassModel::class,
            'class_student',
            'student_id',
            'class_id'
        );
    }
}