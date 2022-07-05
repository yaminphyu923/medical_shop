<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Refill;
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
        "total_qty",
        "showqty",
        "start_date",
        "category_id",
        "group_id",
        "price",
        "unit_id",
        "expired_date",
        "customer_id",
        "last_remaining",
        "last_remaining_qty",
        "photo",
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

    public function unit()
    {
        return $this->belongsTo(Unit::class,'user_id','id');
    }

    public function refills(){
        return $this->hasMany(Refill::class);
    }
}
