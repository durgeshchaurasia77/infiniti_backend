<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    

    protected $table = 'admins';

    protected $fillable = [
        'id',
        'name',
        'email',
        'otp',
        'mobile',
        'profile_image',
        'password',
        'password_text',
        'status'
    ];
}
