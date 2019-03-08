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
Route::get('/new-employee', 'PagesController@newEmployee');
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
Route::get('/profile', 'PagesController@profile');


Route::delete('/delete-all', 'EmployeesController@deleteAll'); // Delete all products
Route::resource('/view-employees', 'EmployeesController');
Route::resource('/new-employee', 'EmployeesController');
Route::get('/', 'EmployeesController@dashboard');
Route::resource('/upload', 'AttendanceController');
Route::get('/attendance-log', 'AttendanceController@index');
Route::post('/import', 'AttendanceController@import');
