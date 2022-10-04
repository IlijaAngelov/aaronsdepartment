<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function fileImportExport()
    {
        return view('file_import');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    public function index()
    {
        $users = DB::table('users')
        ->distinct()
        ->get(['Employee']);

        return view('view_table', compact('users'));

    }

    public function view(Request $request)
    {
        $name = $request->all('name');

        $user = DB::table('users')
        ->where('employee', $name)
        ->get();

        $user = DB::table('users')
        ->selectRaw('round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours),2) as total_pay,
        round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour))),2) as avg_per_hour')
        ->where('Employee', $name)
        ->get();

        $completedPayments = DB::table('users')
        ->where('Employee', $name)
        ->where('status', 'Complete')
        ->orderByDesc('Date')
        ->limit(5)
        ->get();

        return view('view_employee', compact('name', 'user', 'completedPayments'));
    }

    public function total()
    {

        $userTotal = DB::table('users')
        ->selectRaw('id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as total')
        ->paginate(25);

        return view('view_total', compact('userTotal'));
    }

    public function filterTotal(Request $request)
    {

        $filter = $request->all('filter');

        $userTotal = DB::table('users')
        ->selectRaw("id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as 'total' ")
        ->where(DB::raw('SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours'), '>=', $filter)
        ->paginate(25);

        return view('view_total', compact('userTotal'));
    }
}
