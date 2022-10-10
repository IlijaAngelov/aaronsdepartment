<?php

namespace App\Imports;

use App\Models\Shift;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ShiftsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Shift([
            "Date" => $row[0],
            "Employee" => $row[1],
            "Employer" => $row[2],
            "Hours" => $row[3],
            "Rate_per_Hour" => $row[4],
            "Taxable" => $row[5],
            "Status" => $row[6],
            "Shift_Type" => $row[7],
            "Paid_At" => $row[8]
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
