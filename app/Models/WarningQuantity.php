<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarningQuantity extends Model
{
    use HasFactory;

    protected $table="warning_quantities";
    protected $fillable=[
        "yellow_warning",
        "red_warning"
    ];
}
