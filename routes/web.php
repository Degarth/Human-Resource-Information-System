<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('Pages.dashboard');
});*/

//Route::resource('/', 'PagesController');

Route::get('/', 'PagesController@index');
/*Route::get('/new-employee', 'PagesController@newEmployee');
Route::get('/view-employees', 'PagesController@viewEmployees');
Route::get('/attendance-log', 'PagesController@attendanceLog');
Route::get('/upload-attendance', 'PagesController@uploadAttendance');
Route::get('/add-leave-type', 'PagesController@addLeaveType');
Route::get('/leave-types', 'PagesController@leaveTypes');
Route::get('/view-leaves', 'PagesController@viewLeaves');
Route::get('/new-campus', 'PagesController@newCampus');
Route::get('/view-campus', 'PagesController@viewCampus');
Route::get('/add-department', 'PagesController@addDepartment');
Route::get('/view-department', 'PagesController@viewDepartment');
Route::get('/attendance-report', 'PagesController@attendanceReport');
Route::get('/leave-report', 'PagesController@leaveReport');
Route::get('/profile', 'PagesController@profile');*/


Route::delete('/delete-all', 'EmployeesController@deleteAll'); // Delete all products
Route::resource('/view-employees', 'EmployeesController');
Route::resource('/new-employee', 'EmployeesController');
#Route::get('/upload', 'AttendanceController@import');
Route::resource('/attendance-log', 'AttendanceController');
Route::get('/upload-attendance', 'AttendanceController@create');
Route::get('/export-attendance', 'AttendanceController@createExport');
Route::get('/add-attendance', 'AttendanceController@add_one');
Route::delete('delete-attendance', 'AttendanceController@deleteAll');
Route::post('/import', 'AttendanceController@import')->name('import');
Route::post('/export', 'AttendanceController@export')->name('export');
Route::resource('/leaves', 'LeavesController');
Route::get('add-leave-type', 'LeaveTypesController@create');
Route::resource('/leave-types', 'LeaveTypesController');
Route::resource('/view-campus', 'CampusController');
Route::get('/new-campus', 'CampusController@create');
Route::resource('/departments', 'DepartmentsController');
Route::get('/add-department', 'DepartmentsController@create');

Route::resource('/attendance-report', 'AttendanceReportController');
Route::get('/search', 'AttendanceReportController@search');

