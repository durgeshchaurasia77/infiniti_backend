<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogNews extends Model
{
    use HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'blogs_news';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'name',
                                    'title',
                                    'blog_image',
                                    'description',
                                    'summary',
                                    'image',
                                    'status',
                                    'update_at',
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
