<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurJourney extends Model
{
    use HasFactory;
    protected $table = 'your_journey';

    protected $fillable = [
        'title',
        'sub_title',
        'status',
    ];
}
