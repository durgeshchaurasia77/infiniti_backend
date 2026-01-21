<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LeverageAi extends Model
{
    use HasFactory;
    protected $table = 'leverage_ai';
    protected $fillable = [
                            'name',
                            'status',
                            'short_description',
                        ];

}
