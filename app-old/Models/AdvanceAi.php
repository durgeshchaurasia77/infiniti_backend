<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AdvanceAi extends Model
{
    use HasFactory;
    protected $table = 'advance_ai';
    protected $fillable = [
                            'name',
                            'status',
                            'features',
                            'image',
                        ];
   protected $casts = [
        'features' => 'array',
    ];
}
