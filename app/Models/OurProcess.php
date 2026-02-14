<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProcess extends Model
{
    use HasFactory;

    protected $table = 'our_process';

    protected $fillable = [
        'title_header_one',
        'title_step_one',
        'image_step_one',
        'short_description_step_one',
        'title_step_two',
        'image_step_two',
        'short_description_step_two',
        'title_step_three',
        'image_step_three',
        'short_description_step_three',
        'title_header_two',
        'short_description_two',
        'title_step_four',
        'image_step_four',
        'short_description_step_four',
    ];
}
