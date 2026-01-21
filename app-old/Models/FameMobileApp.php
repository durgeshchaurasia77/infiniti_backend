<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FameMobileApp extends Model
{
    use HasFactory;
    protected $table = 'fame_mobile_app';

    protected $fillable = [
        'name',
        'title',
        // 'sub_title',
        'image',
        'status'
    ];
}
