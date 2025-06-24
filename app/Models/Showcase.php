<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    use HasFactory;

    public function showcaseProducts()
    {
        return $this->hasMany(ShowcaseProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'showcase_products');
    }
}
