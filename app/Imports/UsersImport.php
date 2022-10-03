<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            // "Date" => 'Date',
            // "Employee" => 'Employee',
            // "Employer" => 'Employer',
            // "Hours" => 'Hours',
            // "Rate per Hour" => 'Rate per Hour',
            // "Taxable" => 'Taxable',
            // "Status" => 'Status',
            // "Shift_type" => 'Shift Type',
            // "Paid At" => 'Paid At'


            "Date" => $row[0],
            "Employee" => $row[1],
            "Employer" => $row[2],
            "Hours" => $row[3],
            "Rate_per_Hour" => $row[4],
            "Taxable" => $row[5],
            "Status" => $row[6],
            "Shift_Type" => $row[7],
            "Paid_At" => $row[8]

            // 'name' => $row[0],
            // 'email' => $row[1],
            // 'password' => Hash::make($row[2])
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
