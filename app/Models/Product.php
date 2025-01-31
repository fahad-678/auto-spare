<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'category_id',
        'sub_category_id',
        'brand_id',
        'stock',
        'status',
    ];
    protected $appends = ['discounted_price'];

    public function getDiscountedPriceAttribute()
    {
        if (!$this->hasDiscount()) {
            return $this->price;
        }
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImageUrl()
    {
        return $this->images->first()?->image_url ?? asset('assets/media/img/noimgfind.jpeg');
    }

    public function hasDiscount(): bool
    {
        return $this->discount > 0;
    }

    public function formattedPrice()
    {
        return $this->discounted_price . ' ' . config('settings.currency');
    }

    public function scopeGetDiscountProduct(Builder $query)
    {
        return $query->whereNotNull('discount');
    }
}
