<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcellanceCounting extends Model
{
    use HasFactory;
    protected $table = 'excelanace_counting';


    protected $fillable = [
        'industry_count',
        'empowered_count',
        'coutries_count',
        'teach_engineer_count',
        'digital_solution_count',
    ];

    protected $casts = [
        'industry_count'          => 'integer',
        'empowered_count'         => 'integer',
        'coutries_count'          => 'integer',
        'teach_engineer_count'    => 'integer',
        'digital_solution_count'  => 'integer',
    ];
}
