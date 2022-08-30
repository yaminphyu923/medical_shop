<?php

namespace App\Imports;

use App\Models\MedicalList;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicalListsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicalList([
            'name' => (isset($row[0]))?$row[0]:'-',
            'total_qty' => (isset($row[1]))?$row[1]:'-',
            'start_date' => (isset($row[2]))?$row[2]:'-',
            'category_id' => (isset($row[3]))?$row[3]:'-',
            'original_price' => (isset($row[4]))?$row[4]:'-',
            'price' => (isset($row[5]))?$row[5]:'-',
            'expired_date' => (isset($row[6]))?$row[6]:'-',
            'last_remaining_qty' => (isset($row[7]))?$row[7]:'-',
            'note' => (isset($row[8]))?$row[8]:'-',
        ]);
    }
}
