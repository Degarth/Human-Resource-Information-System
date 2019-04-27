<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;

class AttendanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
        ->select(DB::raw("id,CONCAT(firstname,' ',lastname) as fullname"))
        ->orderBy('lastname','asc')
        ->pluck('fullname','fullname');
        $attendances = Attendance::orderBy('id', 'desc')->paginate(50);
        return view('pages.report.attendance_report', compact('employees', 'attendances'));
    }

    public function search(Request $request)
    {
        $employees = DB::table('employees')
        ->select(DB::raw("id,CONCAT(firstname,' ',lastname) as fullname"))
        ->orderBy('lastname','asc')
        ->pluck('fullname','fullname');
        $fullname = $request->input('fullname');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');
        $attendances = DB::table('attendances')
                                    ->where('fullname', $fullname)
                                    ->where(function ($query) use ($date_from, $date_to) {
                                        $query->whereBetween('visited', array($date_from, $date_to));
                                    })->paginate(20);

        $attendances->appends(['fullname' => $fullname, 'visited' => array($date_from, $date_to)]);
        
        foreach($attendances as $attendance)
        {
            $hours = date('H:i', (strtotime($attendance->to) - strtotime($attendance->from)));
        }
        return view('pages.report.attendance_report', ['attendances' => $attendances], compact('employees', 'fullname'));
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
        //
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
        //
    }

    
    /*public function search(Request $request) 
    {
        $kadastronr = $request->get('kadastronr');
        $kodas = $request->get('kodas');
        $pavadinimas = $request->get('pavadinimas');
        $adresas = $request->get('adresas');
        $aukstai = $request->get('aukstai');
        $busena = $request->get('busena');
        $pastatai = DB::table('pastatas')
                                ->where(function ($query) use ($kadastronr, $kodas, $pavadinimas, $adresas, $aukstai, $busena) {
                                    if(!empty($kadastronr)) {
                                        $query->where('kadastronr', 'like', '%'.$kadastronr.'%');
                                    }
                                    if(!empty($kodas)) {
                                        $query->orWhere('kodas', 'like', '%'.$kodas.'%');
                                    }
                                    if(!empty($pavadinimas)) {
                                        $query->orWhere('pavadinimas', 'like', '%'.$pavadinimas.'%');
                                    }
                                    if(!empty($adresas)) {
                                        $query->orWhere('adresas', 'like', '%'.$adresas.'%');
                                    }
                                    if(!empty($aukstai)) {
                                        $query->orWhere('aukstai', 'like', '%'.$aukstai.'%');
                                    }
                                    if(!empty($busena)) {
                                        $query->orWhere('busena', 'like', '%'.$busena.'%');
                                    }  
                                })
                                ->paginate(20);
        $pastatai->appends(['kadastronr' => $kadastronr, 'kodas' => $kodas, 'pavadinimas' => $pavadinimas, 'adresas' => $adresas, 'aukstai' => $aukstai, 'busena' => $busena]);

        return view('pages.pastatai', ['pastatai' => $pastatai]);
    }*/
}
