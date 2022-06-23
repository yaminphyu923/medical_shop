<?php

namespace App\Exports;

use App\Models\MedicalList;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MedicalListsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MedicalList::join('categories','categories.id','=',"medical_lists.category_id")
                            ->select('medical_lists.name as medical_name','medical_lists.total_qty','medical_lists.start_date','categories.name as category_name','medical_lists.price','medical_lists.expired_date','medical_lists.last_remaining_qty','medical_lists.note')
                            ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Total Qty',
            'Start Date',
            'Category',
            'Price',
            'Expired Date',
            'Last Remaining Qty',
            'Note',
        ];
    }
}
