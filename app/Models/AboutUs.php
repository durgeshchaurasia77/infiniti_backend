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
    protected $fillable = [
        'title',
        'sub_title',
        'short_description',
        'experience',
        'countries',
        'delivered',
        'enthusiasts',
        'image',
        'human_centric_title',
        'human_centric_description',
        'exceptional_expertis_title',
        'exceptional_expertise_description',
        'end_to_end_support_title',
        'end_to_end_support_description',
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
