<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return User::select('name','lastname','email','role','account_no','school_name','password')->get();
    }

    public function headings(): array
    {
        return [
            'Name','Last Name','Email','Role','Account Number','School Name','Password'
        ];
    }
}