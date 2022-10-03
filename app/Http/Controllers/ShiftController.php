<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = DB::table('users')
        ->distinct()
        ->get('shift_type');
        return view('shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = new User;
        $shift->date = now();
        $shift->employee = $request->employee;
        $shift->employer = $request->employer;
        $shift->hours = $request->hours;
        $shift->rate_per_hour = $request->rate_per_hour;
        $shift->taxable = $request->taxable;
        $shift->status = $request->status;
        $shift->shift_type = $request->shift_type;
        $shift->paid_at = $request->paid_at;
        $shift->save();

        // $request->validate([
        //     'employee' => 'required|max:255',
        //     'employer' =>'required|max:255',
        //     'hours' =>'required|min:1',
        //     'rate_per_hour' =>'required',
        //     'taxable' =>'required',
        //     'status' =>'required',
        //     'shift_type' =>'required',
        //     'paid_at' =>'required'
        // ]);
        // $time = Carbon::now();
        // User::create([
        //     'date' => $request->$time,
        //     'employee' => $request->employee,
        //     'employer' => $request->employer,
        //     'hours' => $request->hours,
        //     'rate_per_hour' => $request->rate_per_hour,
        //     'taxable' => $request->taxable,
        //     'status' => $request->status,
        //     'shift_type' => $request->shift_type,
        //     'paid_at' => $request->paid_at
        // ]);

        return redirect(route('view_total'))->with('success', 'New Shift has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('shift.edit', [
            'user' => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'date' => now(),
            'employee' => $request->employee,
            'employer' => $request->employer,
            'hours' => $request->hours,
            'rate_per_hour' => $request->rate_per_hour,
            'taxable' => $request->taxable,
            'status' => $request->status,
            'shift_type' => $request->shift_type,
            'paid_at' => $request->paid_at
        ]);

        return redirect(route('view_total'))->with('success', 'A Shift has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('view_total'))->with('success', 'A shift has been deleted!');
    }
}
