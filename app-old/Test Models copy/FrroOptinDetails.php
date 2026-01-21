<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrroOptinDetails extends Model
{
    use HasFactory;
    protected $table = 'frro_optin_details';

    protected $fillable = [
                                'frro_optin_ids',
                                'titles',
                            ];
}
