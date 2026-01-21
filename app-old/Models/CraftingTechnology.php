<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftingTechnology extends Model
{
    use HasFactory;
    protected $table = 'crafting_technology';

    protected $fillable = [
        'name',
        'title',
        'image',
    ];
}
