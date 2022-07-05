<?php

namespace App\Models;

use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalListPrice extends Model
{
    use HasFactory;

    protected $table="medical_list_prices";
    protected $fillable=[
        "medical_list_id",
        "price",
        "unit",
    ];

    public function medicalList()
    {
        return $this->belongsTo(MedicalList::class,'medical_list_id','id');
    }
}
