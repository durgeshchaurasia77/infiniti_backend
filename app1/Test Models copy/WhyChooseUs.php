<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WhyChooesDetails;

class WhyChooseUs extends Model
{
    use HasFactory;
    protected $table = 'why_choose';

    protected $fillable = [
        'id',
        'question',
        'answer',
        'status'
    ];
    public function details()
    {
        return $this->hasMany(WhyChooesDetails::class, 'why_choose_ids', 'id');
    }
}
