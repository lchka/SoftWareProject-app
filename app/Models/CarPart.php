<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'car_model',
        'car_brand',
        'price',
        'point_price',
        'year_of_prod',
        'usage_level',
        'car_part_image'
    ];
    //for many to many with basket
    public function users()
    {
        return $this->belongsToMany(User::class, 'basket')->withPivot('quantity');
    }
}
