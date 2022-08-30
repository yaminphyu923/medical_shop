<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=[
        "voucher",
        "medical_list_id",
        "price",
        "qty",
        "total_amount",
        "customer_id",
        "debt_money",
        "debt",
        "pay_money",
        "status"
    ];

    public function medicalList(){
        return $this->belongsTo(MedicalList::class,'medical_list_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
