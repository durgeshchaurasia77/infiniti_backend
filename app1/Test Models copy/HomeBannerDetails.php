<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBannerDetails extends Model
{
    use HasFactory;
    protected $table = 'home_banner_details';

    protected $fillable = [
                                'home_banner_ids',
                                'titles',
                            ];
}
