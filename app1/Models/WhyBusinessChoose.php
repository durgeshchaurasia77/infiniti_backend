<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyBusinessChoose extends Model
{
    use HasFactory;
    protected $table = 'why_business_choose';


    protected $fillable = [
        'ai_title',
        'ai_description',
        'scalable_title',
        'scalable_description',
        'reliable_title',
        'reliable_description',
        'security_title',
        'security_description',
        'status',
    ];

}
