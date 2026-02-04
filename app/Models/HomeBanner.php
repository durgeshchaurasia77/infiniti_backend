<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeBannerDetails;
class HomeBanner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
                            'id',
                            'title',
                            'image',
                            'detais'
                        ];


    protected $casts = [
        'detais' => 'array',
    ];
}
