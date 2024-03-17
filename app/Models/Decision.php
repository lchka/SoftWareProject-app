<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'car_model',
        'car_brand',
        'year_of_prod',
        'status',
        'decision_image'
    ];
    protected $table = 'decision';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
