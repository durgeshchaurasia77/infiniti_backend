<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSoftware extends Model
{
    use HasFactory;
    protected $table = 'certificate_software';

    protected $fillable = [
        'title',
        'sub_title',
        'image',
    ];
}
