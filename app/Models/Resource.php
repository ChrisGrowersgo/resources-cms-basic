<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Resource extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'category_id', 'sub_category_id', 'address', 
        'postal_code', 'state_id', 'city_id', 'village', 'phone_1', 'phone_2', 
        'email', 'url', 'latitude', 'longitude', 'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}