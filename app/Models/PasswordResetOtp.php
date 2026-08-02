<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetOtp extends Model
{
    protected $fillable = [

        'email',

        'password',

        'otp',

        'expired_at'

    ];
}