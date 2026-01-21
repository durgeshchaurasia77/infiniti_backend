<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpactServicesDetails extends Model
{
    use HasFactory;
    protected $table = 'expact_services_details';

    protected $fillable = [
                                'expact_services_ids',
                                'titles',
                            ];
}
