<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PowerPacked extends Model
{
    use HasFactory;
    protected $table = 'power_packed';
    protected $fillable = [
                            'category_id',
                            'name',
                            'status',
                            'short_description',
                        ];

}
