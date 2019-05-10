<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\LeaveType;
use App\Employee;
use DB;

class LeaveReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::orderBy('id', 'desc')->paginate(20);
        $employees = DB::table('users')
        ->select(DB::raw("id,CONCAT(name,' ',email) as fullname"))
        ->orderBy('email','asc')
        ->pluck('fullname','id');
        $types = LeaveType::all();
        return view('pages.report.leave_report', compact('leaves', 'employees', 'types'));
    }

    public function search(Request $request)
    {
        $employees = DB::table('users')
        ->select(DB::raw("id,CONCAT(name,' ',email) as fullname"))
        ->orderBy('email','asc')
        ->pluck('fullname','id');
        $types = LeaveType::all();
        $fullname = $request->input('fullname');

        $leaves = Leave::where('user_id', $fullname)->orderBy('id', 'desc')->paginate(20);

        $leaves->appends(['user_id' => $fullname]);
        return view('pages.report.leave_report', ['leaves' => $leaves], compact('employees', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
