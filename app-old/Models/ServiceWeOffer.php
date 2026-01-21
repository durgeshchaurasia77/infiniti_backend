<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ServiceWeOffer extends Model
{
    use HasFactory;
    protected $table = 'service_we_offer';
    protected $fillable = [
                            'name',
                            'status',
                            'short_description',
                        ];

}
