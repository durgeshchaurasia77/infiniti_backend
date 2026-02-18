<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ClientSatisfation extends Model
{
    use HasFactory;
    protected $table = 'client_satisfaction';
    protected $fillable = [
                            'category_id',
                            'name',
                            'status',
                            'image',
                            'short_description',
                        ];

}
