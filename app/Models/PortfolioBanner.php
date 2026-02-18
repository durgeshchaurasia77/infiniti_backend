<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioBanner extends Model
{
    use HasFactory;
    protected $table = 'portfolio_banner';
    protected $fillable = [
        'name',
        'image',
        'growth',
        'result',
        'short_description',
        'status',
        'category_id'
    ];
}
