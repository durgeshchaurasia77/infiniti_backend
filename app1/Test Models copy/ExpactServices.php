<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpactServicesDetails;
class ExpactServices extends Model
{
    use HasFactory;
    protected $table = 'expact_services';

    protected $fillable = [
                            'id',
                            'title',
                            'subtitle',
                            'youtube_link',
                            'slug',
                        ];
    public function details()
    {
        return $this->hasMany(ExpactServicesDetails::class, 'expact_services_ids', 'id');
    }
}
