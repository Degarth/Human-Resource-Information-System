<?php

namespace App\Http\Controllers;

use App\Imports\AttendancesImport;
use App\Exports\AttendancesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Employee;
use App\Attendance;
use App\Campus;
use DB; 

class AttendanceController extends Controller
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
        $attendances = Attendance::orderBy('visited', 'desc')->paginate(50);
        return view('pages.attendance.attendance_log')->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.attendance.upload_attendance');
    }

    public function createExport()
    {
        $attendances = Attendance::all();
        return view('pages.attendance.export_attendance', compact('attendances'));
    }

    public function add_one()
    {
        $campuses = Campus::pluck('name', 'id');
        $employees = DB::table('employees')
        ->select(DB::raw("id,CONCAT(firstname,' ',lastname) as fullname"))
        ->orderBy('lastname','asc')
        ->pluck('fullname','id');
        return view('pages.attendance.add_attendance', compact('campuses', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if($request->hasFile('attendance')) {
            $path = $request->file('attendance')->getRealPath();
        }*/

        $this->validate($request, [
            'employee_id' => 'required',
            'visited' => 'required|date|before:now',
            'campus_id' => 'required',
            'from' => 'required',
            'to' => 'required'

        ]);

        $attendance = new Attendance;
        $attendance->employee_id = $request->input('employee_id');
        $attendance->visited = $request->input('visited');
        $attendance->campus_id = $request->input('campus_id');
        $attendance->from = $request->input('from');
        $attendance->to = $request->input('to');
        $attendance->save();
        
        return redirect('/attendance-log')->with('success', $attendance->employee_id.' - Attendance Added');
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
        $attendance = Attendance::find($id);
        $attendance->delete();  
        return redirect('/attendance-log')->with('success', 'Attendance Removed');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        Attendance::destroy($ids);
        return redirect('/attendance-log')->with('success', 'All Selected Attendances Removed');
    }

    
        /*$attendances = Excel::toCollection(new AttendancesImport(), $request->file('attendance'));
        foreach($attendances[0] as $attendance)
        {
            Attendance::where('id', $attendance[0])->update([
                'fullname' => $attendance[1],
                'visited' => $attendance[2],
                'campus' => $attendance[3],
            ]);
        }*/
        
    public function import(Request $request)
    {    
        try {
            Excel::import(new AttendancesImport(), $request->file('attendance'));
        } catch(\Exception $ex) {
            return back()->withError('Excel File is not as Expected!');
        }
        return redirect('/attendance-log')->with('success', 'Attendance Log Imported');
    }

    public function export()
    {
        return Excel::download(new AttendancesExport, 'Attendances.xlsx');
    }
    
}
