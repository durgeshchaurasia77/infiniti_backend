<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    protected $table = 'industry';
    protected $fillable = [
                            'header_title',
                            'header_short_description',
                            'header_image',
                            'title',
                            'short_description',
                            'image',
                            'video',
                            'seo_slug',
                            'seo_title',
                            'seo_keywords',
                            'seo_description',
                            'seo_image',
                            'status'
                        ];
 
}
