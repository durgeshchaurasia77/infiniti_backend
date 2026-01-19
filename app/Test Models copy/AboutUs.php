<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'about_us';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'title',
                                    'description',
                                    'image',
                                    'achievement',
                                    'experties',
                                    'contact_no',
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
