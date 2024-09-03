<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'part_number',
        'oem',
        'description',
        'price',
        'discount',
        'sub_category_id',
        'brand_id',
        'stock',
        'image',
        'status',
    ];


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
