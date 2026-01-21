<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetEnquiry extends Model
{
    use HasFactory;
             /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'get_enquiry';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'name',
                                    'email',
                                    'phone',
                                    'question',
                                    'get_question_id',
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
