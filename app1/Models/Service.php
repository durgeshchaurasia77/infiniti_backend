<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
                            'name',
                            'title',
                            'status',
                            'features',
                            'short_description',
                            'seo_slug',
                            'seo_title',
                            'seo_keywords',
                            'seo_description',
                            'seo_image',
                        ];
   protected $casts = [
        'features' => 'array',
    ];
}
