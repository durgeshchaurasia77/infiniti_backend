<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeDeliver extends Model
{
    use HasFactory;
    protected $table = 'we_deliver';

    protected $fillable = [
        'name',
        'sub_description',
        'image',
    ];
}
