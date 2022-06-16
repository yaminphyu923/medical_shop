<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalList extends Model
{
    use HasFactory;

    protected $table="medical_lists";
    protected $fillable=[
        "name",
        "qty",
        "start_date",
        "category_id",
        "price",
        "expired_date",
        "customer_id",
        "last_remaining",
        "last_remaining_qty",
        "note"
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
