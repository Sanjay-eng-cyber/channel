<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function showcaseProducts()
    {
        return $this->hasMany(ShowcaseProduct::class);
    }

    public function ProductAttribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')->withPivot('attribute_value_id');
    }

    public function values()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attributes');
    }

    public function storeProductAttributes($attributes, $values, $product)
    {
        foreach ($attributes as $key => $item) {
            if ($values[$key]) {
                ProductAttribute::create([
                    'product_id' => $product,
                    'attribute_id' => $item,
                    'attribute_value_id' => $values[$key],
                ]);
            }
        }
    }

    public function updateProductAttributes($attributes, $values, $product)
    {
        // dd($attributes, $values, $product);
        foreach ($attributes as $key => $item) {
            // dd($values[$key]);
            if ($values[$key]) {
                $attribute = ProductAttribute::where('product_id', $product)->where('attribute_id', $item)->first();
                if ($attribute == null) {
                    ProductAttribute::create([
                        'product_id' => $product,
                        'attribute_id' => $item,
                        'attribute_value_id' => $values[$key],
                    ]);
                } else {
                    $attribute->update([
                        'attribute_value_id' => $values[$key],
                    ]);
                }
            } else {
                // dd($product, $item, $values[$key]);
                optional(ProductAttribute::where('product_id', $product)->where('attribute_id', $item)->delete());
            }
        }
    }

    public function isInCart()
    {
        $user = auth()->user();
        if ($user) {
            $cart = $user->cart;
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        }
        return $cart ? $cart->items()->where('product_id', $this->id)->exists() : false;
    }

    public function isInWishlist()
    {
        $user = auth()->user();
        return $user ? $user->wishlist()->where('product_id', $this->id)->exists() : false;
    }
}
