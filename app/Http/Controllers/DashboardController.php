<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\LeaveType;
use App\Leave;
use App\Campus;
use App\Department;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $types = LeaveType::all();
        $campuses = Campus::all();
        $departments = Department::all();
        $leaves = Leave::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.dashboard', compact('employees', 'types', 'campuses', 'departments', 'leaves'))->with('user', $user->employee);
    }
}
