<?php
namespace App\Helpers;

use App\Models\Order;

class Voucher{
    public static function voucherNumber(){
        $number = mt_rand(100000,999999);

        if(Order::where('voucher',$number)->exists()){
            self::voucherNumber();
        }

        return $number;
    }
}
?>
