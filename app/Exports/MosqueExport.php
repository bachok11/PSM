<?php

namespace App\Exports;

use App\tbl_mosque;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MosqueExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return tbl_mosque::select('mosque_name','income','expense','account_no')->get();
    }

    public function headings(): array
    {
        return [
            'Mosque Name','Income','Expense','Account Number',
        ];
    }
}