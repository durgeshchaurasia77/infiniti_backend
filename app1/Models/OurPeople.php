<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurPeople extends Model
{
    use HasFactory;
    protected $table = 'our_people';

    protected $fillable = [
        'name',
        'title',
        'sub_title',
        'image',
    ];
}
