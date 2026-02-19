<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalCategory extends Model
{
    use HasFactory;
    protected $table = 'digital_category';

    protected $fillable = [
                            'id',
                            'name',
                            'banner_title',
                            'banner_image',
                            'banner_description',
                            'status'
                        ];

    // public function serviceItems()
    // {
    //     return $this->hasMany(Dig::class, 'category_id', 'id');
    // }
}
