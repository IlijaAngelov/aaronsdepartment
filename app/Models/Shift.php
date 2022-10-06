<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    // fix to shifts table
    protected $table = 'users';

    protected $fillable = [
        'Employee',
        'Employer',
        'Hours',
        'Rate_per_Hour',
        'Taxable',
        'Status',
        'Shift_Type',
        'Paid_At'
    ];
}
