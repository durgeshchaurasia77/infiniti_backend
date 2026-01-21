<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AdvanceTechnology extends Model
{
    use HasFactory;
    protected $table = 'advance_technologies';
    protected $fillable = [
                            'name',
                            'status',
                            'details',
                            'short_description',
                        ];
   protected $casts = [
        'details' => 'array',
    ];
}
