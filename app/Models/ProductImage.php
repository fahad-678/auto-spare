<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image_path'];
    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->exists($this->image_path)
            ? asset(Storage::url($this->image_path))
            : asset('assets/media/img/noimgfind.jpeg');
    }
}
