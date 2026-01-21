<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurExpertiesDetails extends Model
{
    use HasFactory;
         /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'our_experties_details';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'our_experties_ids',
                                    'title',
                                    'video_url',
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
