<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\LeaveType;
use App\Leave;
use App\Campus;
use App\Department;

class PagesController extends Controller
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
    
    public function index() {
        $employees = Employee::all();
        $types = LeaveType::all();
        $campuses = Campus::all();
        $departments = Department::all();
        $leaves = Leave::all();
        return view('pages.dashboard', compact('employees', 'types', 'campuses', 'departments', 'leaves'));
    }

    public function viewLeaves() {
        return view('pages.leave.view_leaves');
    }

    public function attendanceReport() {
        return view('pages.report.attendance_report');
    }

    public function leaveReport() {
        return view('pages.report.leave_report');
    }

    public function profile() {
        return view('profile.user');
    }
}
