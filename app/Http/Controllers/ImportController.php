<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Imports\ShiftsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function fileImportExport()
    {
        return view('file_import');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new ShiftsImport, $request->file('file')->store('temp'));
        return back();
    }

    public function index()
    {
        $users = Shift::distinct()
        ->get('Employee');
        return view('view_table', [
            'users' => $users
        ]);

    }

    public function view(Request $request)
    {
        $name = $request->all('name');

        $average = Shift::selectRaw('round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours),2) as total_pay,
        round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour))),2) as avg_per_hour')
        ->where('Employee', $name)
        ->get();

        $completedPayments = Shift::where('Employee', $name)
        ->where('status', 'Complete')
        ->orderBy('Date', 'desc')
        ->limit(5)
        ->get();

        return view('view_employee', [
            'name' => $name,
            'average' => $average,
            'completedPayments' => $completedPayments
        ]);

    }

    public function total()
    {

        $totalUsers = Shift::selectRaw('id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as total')
        ->paginate(25);

        return view('view_total', [
            'totalUsers' => $totalUsers
        ]);
    }

    public function filterTotal(Request $request)
    {

        $filter = $request->all('filter');

        $totalUsers = Shift::selectRaw("id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as 'total' ")
        ->where(Shift::raw('SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours'), '>=', $filter)
        ->paginate(25);

        return view('view_total', [
            'totalUsers' => $totalUsers
        ]);
    }
}
