<?php

namespace App\Http\Controllers;

use App\Imports\AttendancesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'desc')->paginate(50);
        return view('pages.attendance.attendance_log')->with('attendances', $attendances);
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
        if($request->hasFile('attendance')) {
            $path = $request->file('attendance')->getRealPath();
            
        }
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

    public function import(Request $request)
    {
        /*$attendances = Excel::toCollection(new AttendancesImport(), $request->file('attendance'));
        foreach($attendances[0] as $attendance)
        {
            Attendance::where('id', $attendance[0])->update([
                'fullname' => $attendance[1],
                'visited' => $attendance[2],
                'campus' => $attendance[3],
            ]);
        }*/
        

        Excel::import(new AttendancesImport(), $request->file('attendance'));
        return redirect('/attendance-log')->with('success', 'Attendance Log Imported');
    }
    
}
