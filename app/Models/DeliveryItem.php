<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getDispatchDateAttribute($value)
    {
        return date('d-m-Y h:i a', strtotime($value));
    }

    public function delivery(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Delivery::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\product::class);
    }
}
