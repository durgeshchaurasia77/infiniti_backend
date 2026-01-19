<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactExploreDetails;

class ContactExplore extends Model
{
    use HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'explore_opportunities';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'title',
                                    'description',
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
    public function details()
    {
        return $this->hasMany(ContactExploreDetails::class, 'explore_opportunities_ids', 'id');
    }
    
}
