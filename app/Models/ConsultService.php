<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ConsultService extends Model
{
    use HasFactory;
    protected $table = 'consult_service';
    protected $fillable = [
                            'name',
                            'status',
                            'features',
                            'title',
                            'image',
                            'category_id'
                        ];
   protected $casts = [
        'features' => 'array',
    ];
}
