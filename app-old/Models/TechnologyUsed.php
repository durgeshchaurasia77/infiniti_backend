<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyUsed extends Model
{
    use HasFactory;
    protected $table = 'technologies_used';


    protected $fillable = [
        'name',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

}
