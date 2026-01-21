<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServices extends Model
{
    use HasFactory;
    protected $table = 'our_services';

    protected $fillable = [
        'id',
        'image',
        'short_description',
        'description',
        'status'
    ];
}
