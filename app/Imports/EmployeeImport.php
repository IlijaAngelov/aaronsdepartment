<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            "date" => $row['Date'],
            "employee" => $row['Employee'],
            "employer" => $row['Employer'],
            "hours" => $row['Hours'],
            "rate_per_hour" => $row['Rate Per Hour'],
            "taxable" => $row['Taxable'],
            "status" => $row['Status'],
            "shift_type" => $row['Shift Type'],
            "paid_at" => $row['Paid At']
        ]);
    }
}
