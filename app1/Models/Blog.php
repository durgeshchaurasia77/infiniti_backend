<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
                            'category_id',
                            'title',
                            'author',
                            'image',
                            'short_detail',
                            'publish_date',
                            'details',
                            'seo_slug',
                            'seo_title',
                            'seo_keywords',
                            'seo_description',
                            'seo_image',
                            'status'
                        ];
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
