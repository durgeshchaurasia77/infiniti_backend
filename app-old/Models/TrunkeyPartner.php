<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrunkeyPartner extends Model
{
    use HasFactory;
    protected $table = 'trunkey_partners';

    protected $fillable = [
                            'title',
                            'short_description',
                            'image_one',
                            'image_two',
                            'status',
                        ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
