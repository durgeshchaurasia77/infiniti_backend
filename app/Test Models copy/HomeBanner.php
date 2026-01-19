<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeBannerDetails;
class HomeBanner extends Model
{
    use HasFactory;
    protected $table = 'home_banner';

    protected $fillable = [
                            'id',
                            'title',
                            'subtitle',
                            'youtube_link',
                        ];
    public function details()
    {
        return $this->hasMany(HomeBannerDetails::class, 'home_banner_ids', 'id');
    }
}
