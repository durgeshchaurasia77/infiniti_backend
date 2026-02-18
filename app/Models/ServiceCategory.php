<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_category';

    protected $fillable = [
                            'id',
                            'name',
                            'status'
                        ];

    public function serviceItems()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
