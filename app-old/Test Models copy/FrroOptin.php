<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FrroOptinDetails;
class FrroOptin extends Model
{
    use HasFactory;
    protected $table = 'frro_optin';

    protected $fillable = [
                            'id',
                            'title',
                            'description',
                            'image',
                        ];
    public function details()
    {
        return $this->hasMany(FrroOptinDetails::class, 'frro_optin_ids', 'id');
    }
}
