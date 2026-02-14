<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
                            'category_id',
                            'title',
                            'image',
                            'short_detail',
                            'contry',
                            'platform',
                            'status'
                        ];
    public function category()
    {
        return $this->belongsTo(FeatureProduct::class, 'category_id');
    }
}
