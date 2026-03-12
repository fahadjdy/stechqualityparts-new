<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Observers\ProductObserver;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'code',
        'description',
        'meta_title',
        'meta_description',
        'image'
    ];

    protected static function boot()
    {
        parent::boot();
        static::observe(ProductObserver::class);
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('assets/images/placeholder.png');
    }
}
