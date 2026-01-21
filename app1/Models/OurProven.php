<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OurProven extends Model
{
    use HasFactory;
    protected $table = 'our_proven';
    protected $fillable = [
                            'name',
                            'status',
                            'features',
                            'short_description',
                        ];
   protected $casts = [
        'features' => 'array',
    ];
}
