<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.dashboard');
    }

    public function viewEmployees() {
        return view('pages.employee.view_employees');
    }

    public function newEmployee() {
        return view('pages.employee.new_employee');
    }

    public function attendanceLog() {
        return view('pages.attendance.attendance_log');
    }

    public function uploadAttendance() {
        return view('pages.attendance.upload_attendance');
    }

    public function addLeaveType() {
        return view('pages.leave.add_leave_type');
    }

    public function leaveTypes() {
        return view('pages.leave.leave_types');
    }

    public function viewLeaves() {
        return view('pages.leave.view_leaves');
    }

    public function addDepartment() {
        return view('pages.department.add_department');
    }

    public function viewDepartment() {
        return view('pages.department.view_department');
    }

    public function newCampus() {
        return view('pages.campus.new_campus');
    }

    public function viewCampus() {
        return view('pages.campus.view_campus');
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
