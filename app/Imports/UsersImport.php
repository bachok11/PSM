<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'lastname'     => $row['lastname'],
            'email'    => $row['email'],
            'role'    => $row['role'],
            'account_no'    => $row['account_no'],
            'school_name'    => $row['school_name'],
            'password' => \Hash::make($row['password']),
        ]);
    }
}
