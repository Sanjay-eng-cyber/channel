<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function couponUsage()
    {
        return $this->hasMany(CouponUsage::class);
    }

    public static function findPromoCode($code)
    {
        return self::where('code', $code)->where('type', "Promo")->first();
    }

    public function discount($total)
    {
        if ($this->rate === 'flat') {
            return $this->value;
        } elseif ($this->rate === 'percent') {
            $gst = gst($total);
            $total = $total - $gst['total'];
            // dd($gst, $total);
            return ($this->value / 100) * $total;
        } else {
            return 0;
        }
    }

    public function isValid()
    {
        $usageCount = CouponUsage::where('coupon_id', $this->id)
            ->count();
        return now() >= $this->valid_from && now() <= $this->valid_till && $usageCount < $this->max_usage;
    }
}
