<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpoweringCareersDetails extends Model
{
    use HasFactory;
         /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'empowering_careers_details';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'empowering_careers_ids',
                                    'title',
                                    'percentage',
                                ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
    ];
}
