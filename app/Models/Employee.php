<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'employee',
        'employer',
        'hours',
        'rate_per_hour',
        'taxable',
        'status',
        'shift_type',
        'paid_at'
    ];
}
