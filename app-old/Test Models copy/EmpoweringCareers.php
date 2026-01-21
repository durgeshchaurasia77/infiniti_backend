<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmpoweringCareersDetails;

class EmpoweringCareers extends Model
{
    use HasFactory;
         /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table 	= 	'empowering_careers';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable 	= 	[
                                    'title',
                                    'image',
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
        return $this->hasMany(EmpoweringCareersDetails::class, 'empowering_careers_ids', 'id');
    }
}
