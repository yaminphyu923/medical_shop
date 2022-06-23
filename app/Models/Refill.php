<?php

namespace App\Models;

use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refill extends Model
{
    use HasFactory;

    protected $table="refills";
    protected $fillable=[
        "medical_list_id",
        "refill_qty",
        "refill_exp",
    ];

    public function medicalList()
    {
        return $this->belongsTo(MedicalList::class,'medical_list_id','id');
    }
}
