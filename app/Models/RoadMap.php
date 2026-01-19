<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RoadMap extends Model
{
    use HasFactory;
    protected $table = 'roadmap';
    protected $fillable = [
                            'name',
                            'title',
                            'status',
                            'details',
                            'short_description',
                        ];
   protected $casts = [
        'details' => 'array',
    ];
}
