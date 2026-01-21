<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrroLocation extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'frro_location';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'title',
                                    'description',
                                    'latitude',
                                    'longitude',
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
