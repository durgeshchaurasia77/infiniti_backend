<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeBannerDetails;
class Features extends Model
{
    use HasFactory;
    protected $table = 'features';
    protected $fillable = [
                            'name',
                            'title',
                            'short_description',
                            'details',
                            'image',
                        ];


    protected $casts = [
        'details' => 'array',
    ];
}
