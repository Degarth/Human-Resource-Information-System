<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\Campus;
use App\Department;
use App\User;

class EmployeesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(20);
        return view('pages.employee.view_employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */   
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $departments = Department::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        return view('pages.employee.create', compact('departments', 'campuses'))->with('user', $user->employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'position' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'birthday' => 'required|date',
            'telephone' => 'required',
            'address' => 'required',
            'salary' => 'required|numeric',
            'avatar' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('avatar')) {
            //Get file name with the extension
            $fileNameWithTxt = $request->file('avatar')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithTxt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('avatar')->guessClientExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Avatar
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }

        //Create Employee
        $employee = new Employee;
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->campus_id = $request->input('campus_id');
        $employee->position = $request->input('position');
        $employee->department_id = $request->input('department_id');
        $employee->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->gender = $request->input('gender');
        $employee->birthday = $request->input('birthday');
        $employee->address = $request->input('address');
        $employee->salary = $request->input('salary');
        $employee->avatar = $fileNameToStore;
        $employee->save();

        return redirect('/view-employees')->with('success', 'Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('pages.employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        $employee = Employee::find($id);
        return view('pages.employee.edit', compact('departments', 'campuses', 'employee'));
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
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            #'campus' => 'required',
            'position' => 'required',
            #'department' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'avatar' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('avatar')) {
            //Get file name with the extension
            $fileNameWithTxt = $request->file('avatar')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithTxt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('avatar')->guessClientExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Avatar
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }


        $employee = Employee::find($id);
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->campus_id = $request->input('campus_id');
        $employee->position = $request->input('position');
        $employee->department_id = $request->input('department_id');
        $employee->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->gender = $request->input('gender');
        $employee->birthday = $request->input('birthday');
        $employee->address = $request->input('address');
        $employee->salary = $request->input('salary');
        if($request->hasFile('avatar')) {
            $employee->avatar = $fileNameToStore;
        }
        $employee->save();

        return redirect('/view-employees')->with('success', 'Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        if($employee->avatar != 'noImage.jpg') {
            //Delete Avatar
            Storage::delete('public/avatars/'.$employee->avatar);
        }
        return redirect('/view-employees')->with('success', 'Employee Removed');
    }
    public function deleteAll(Request $request) 
    {
        $ids = $request->get('ids');
        foreach($ids as $id) {
            $employee = Employee::find($id);
            if($employee->avatar != 'noImage.jpg') {
                //Delete Avatar
                Storage::delete('public/avatars/'.$employee->avatar);
            }
        }
        Employee::destroy($ids);

        return redirect('/view-employees')->with('success', 'Selected Employees Removed');
    }

    public function dashboard() 
    {
        $employees = Employee::all();
        return view('pages.dashboard')->with('employees', $employees);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.worker.profile')->with('employee', $user->employee)->with('user', $user->employee);
    }

    public function editProfile()
    {
        $departments = Department::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.worker.edit_profile', compact('departments', 'campuses'))->with('employee', $user->employee)->with('user', $user->employee);
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'avatar' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('avatar')) {
            //Get file name with the extension
            $fileNameWithTxt = $request->file('avatar')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithTxt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('avatar')->guessClientExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Avatar
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }


        $employee = Employee::find($id);
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->gender = $request->input('gender');
        $employee->birthday = $request->input('birthday');
        $employee->address = $request->input('address');
        if($request->hasFile('avatar')) {
            $employee->avatar = $fileNameToStore;
        }
        $employee->save();

        return redirect('/profile')->with('success', 'Profile Updated');
    }

}
