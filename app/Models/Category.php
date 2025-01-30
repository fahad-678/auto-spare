<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'hot_item'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->exists($this->image)
            ? asset(Storage::url($this->image))
            : asset('assets/media/img/noimgfind.jpeg');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
