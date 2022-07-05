<?php

namespace App\Models;

use App\Models\Order;
use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table="order_details";
    protected $fillable = [
        "order_id",
        "medical_list_id",
        "qty",
        "price",
        "total"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function medicalList()
    {
        return $this->belongsTo(MedicalList::class,'medical_list_id','id');
    }
}
