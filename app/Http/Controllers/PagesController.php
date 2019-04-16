<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\LeaveType;
use App\Campus;
use App\Department;

class PagesController extends Controller
{
    public function index() {
        $employees = Employee::all();
        $types = LeaveType::all();
        $campuses = Campus::all();
        $departments = Department::all();
        return view('pages.dashboard', compact('employees', 'types', 'campuses', 'departments'));
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
