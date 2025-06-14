<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    public function product()
    {
        // dd($this);
        return $this->belongsTo(Product::class);
    }
}
