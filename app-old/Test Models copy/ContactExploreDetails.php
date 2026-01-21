<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactExploreDetails extends Model
{
    use HasFactory;
         /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'explore_opportunities_details';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'explore_opportunities_ids',
                                    'name',
                                    'image',
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
