<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
                                'name',
                                'email',
                                'password',
                                'phone',
                                'show_password',
                                'otp',
                                'forgot_otp',
                                'is_delete',
                                'api_token',
                                'device_type',
                                'device_token',
                                'image',
                                'provider',
                                'status',
                            ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
            /**
   * define the scope variable to get user
   * 
   * @param Query bulider, $product id.
   */
  public function scopesearchBetween($query, $name, $email, $phone)
  {
        # if email is not empty
        if ($email != '') {
           # return by email
           $query = $query->where('email', $email);
        }

        # if phone is not empty
        if ($phone != '') {
           # return by phone
           $query = $query->where('phone', $phone);
        }
        
        # if name is not empty
        if ($name != '') {
           # return by name          
           $query = $query->where('name','LIKE','%'. $name .'%');
        }
       return $query;  
  }
}
