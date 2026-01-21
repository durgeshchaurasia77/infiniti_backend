<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'setting';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'address',
                                    'email',
                                    'phone',
                                    'footer_about',
                                    'footer_image',
                                    'website_url',
                                    'facebook_url',
                                    'twitter_url',
                                    'instagram_url',
                                    'linkedin_url',
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
