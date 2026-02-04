<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurJourneys extends Model
{
    use HasFactory;
    protected $table = 'our_journeys';

    protected $fillable = [
        'title',
        'year',
        'short_description',
        'image',
        'status',
    ];
}
