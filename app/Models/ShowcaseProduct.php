<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowcaseProduct extends Model
{
    use HasFactory;

    public function showcase()
    {
        return $this->belongsTo(Showcase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
