<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\LeaveType;
use App\Campus;
use App\Department;

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
        return view('pages.dashboard', compact('employees', 'types', 'campuses', 'departments'));
    }
}
