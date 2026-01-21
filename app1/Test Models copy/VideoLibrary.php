<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLibrary extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'video_library';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                'title',
                                'video_url',
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
