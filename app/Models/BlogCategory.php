<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blogs_category';

    protected $fillable = [
                            'id',
                            'name',
                            'status'
                        ];

    public function blogItems()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
