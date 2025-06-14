<?php

namespace App\Traits;

trait Taxable {
    /**
     * @param $amount
     * @param $disc
     * @return array
     */
//    protected function extracted($amount, $disc = 0): array
//    {
//        $gst = gst($amount);
//        $subTotal = $amount - $gst['total'];
//        $promoDiscount = session()->get('discount') ?? 0.0;
//        $totalDiscount = $promoDiscount;
//        $grandTotal = ($subTotal - $totalDiscount) + $gst['total'];
//        $gst = $gst['total'];
//        return array($subTotal, $promoDiscount, $grandTotal, $gst);
//    }

    protected function calculated($amount): array
    {
        // $gst = gst($amount);
        // $subTotal = $amount - $gst['total'];
        $totalDiscount = session()->get('discount') ?? 0.0;
        $grandTotal = $amount - $totalDiscount;
        $gst = gst($grandTotal);
        $subTotal = $grandTotal - $gst['total'];
        return array($subTotal, $totalDiscount, $grandTotal, $gst);
    }

    protected static function extracted($amount, $disc = 0): array
    {
        $gst = gst($amount);
        $taxable = $amount - $gst['total'];
        $baseAmount = $amount;

        // if($disc>0){
        //     $baseAmount=$amount-$disc;
        //     $gst=gst($baseAmount,'inc');
        //     $taxable = $baseAmount - $gst['total'];
        // }

        return [$gst, $baseAmount, $taxable];
    }
}
