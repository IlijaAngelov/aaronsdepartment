<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::distinct()
        ->get('Employee');
        return view('view_table', [
            'users' => $users
        ]);

    }

    public function view(Request $request)
    {
        $name = $request->all('name');

        $average = User::selectRaw('round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours),2) as total_pay,
        round(avg(SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour))),2) as avg_per_hour')
        ->where('Employee', $name)
        ->get();

        $completedPayments = User::where('Employee', $name)
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

        $totalUsers = User::selectRaw('id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as total')
        ->paginate(25);

        return view('view_total', [
            'totalUsers' => $totalUsers
        ]);
    }

    public function filterTotal(Request $request)
    {

        $filter = $request->all('filter');

        $totalUsers = User::selectRaw("id, date, employee, employer, hours, rate_per_Hour, taxable, status, shift_type, paid_at, (SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours) as 'total' ")
        ->where(User::raw('SUBSTRING(Rate_per_Hour,2,length(Rate_per_Hour)) * Hours'), '>=', $filter)
        ->paginate(25);

        return view('view_total', [
            'totalUsers' => $totalUsers
        ]);
    }
}
