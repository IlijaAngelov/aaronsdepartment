<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiftFormRequest;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserFormRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ShiftFormRequest $request)
    {
        $request->validated();
        Shift::create([
            'Date'      => now(),
            'Employee' => $request->Employee,
            'Employer' => $request->Employer,
            'Hours'    => $request->Hours,
            'Rate_per_Hour' => "£" . $request->Rate_per_Hour,
            'Taxable'   => $request->Taxable,
            'Status'    => $request->Status,
            'Shift_Type' => $request->Shift_Type,
            'Paid_At'   => $request->Paid_At
        ]);

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
            'user' => Shift::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShiftFormRequest $request, $id)
    {
        $request->validated();

        Shift::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));
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
        Shift::destroy($id);

        return redirect(route('view_total'))->with('success', 'A shift has been deleted!');
    }
}
