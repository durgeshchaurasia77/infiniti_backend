<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
    use HasFactory;
    protected $table = 'features_product';

    protected $fillable = [
                            'id',
                            'name',
                            'status'
                        ];

}
