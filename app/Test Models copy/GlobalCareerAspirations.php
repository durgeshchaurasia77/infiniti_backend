<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalCareerAspirations extends Model
{
    use HasFactory;
                 /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'global_careers_aspirations';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                'title',
                                'image',
                                'status',
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
