<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'color',
        'background',
        'icon',
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}