<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('view');
    }

    public function import()
    {
        // Excel::import(new EmployeeImport, 'shifts(7).csv');
        Excel::import(new EmployeeImport, $request->file);

        return redirect('/')->with('success', 'Data Imported!');
    }
}
