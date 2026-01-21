<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooesDetails extends Model
{
    use HasFactory;
    protected $table = 'why_choose_details';

    protected $fillable = [
        'why_choose_ids',
        'question',
        'answer',
        'status'
    ];
}
