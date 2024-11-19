<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /** @use HasFactory<\Database\Factories\SubCategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'order', 'category_id', 'color', 'background', 'icon'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
