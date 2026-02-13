<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyPartner extends Model
{
    use HasFactory;
    protected $table = 'why_partner';

    protected $fillable = [
        'heading_one',
        'short_description_one',
        'heading_two',
        'short_description_two',
        'heading_three',
        'short_description_three',
    ];
}
