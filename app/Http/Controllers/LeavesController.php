<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\LeaveType;
use App\User;
use Auth;
use Carbon\Carbon;

class LeavesController extends Controller
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
        $leaves = Leave::orderBy('from', 'desc')->paginate(20);
        return view('pages.leave.view_leaves')->with('leaves', $leaves);
    }

    public function application()
    {
        $types_list = LeaveType::pluck('name', 'id');
        $types = LeaveType::orderBy('id', 'asc')->paginate(10);
        return view('pages.worker.leave_application', compact('types_list', 'types'));
    }

    public function myLeaves()
    {
        $user_id = auth()->user()->id;
        #$user_leaves = User::find($user_id)->leaves()->orderBy('from', 'desc')->paginate(20);
        $leaves = Leave::orderBy('from', 'desc')->paginate(20);
        #$leaves = Leave::orderBy('id', 'desc')->paginate(20);
        $user = User::find($user_id);
        return view('pages.worker.my_leaves')->with('leaves', $leaves)->with('user', $user->employee);
    }

    public function approve($id)
    {
        $leave = Leave::find($id);
        $leave->status = "Approved";
        $leave->save();

        return redirect('/view-leaves')->with('success', 'Leave Approved');
    }

    public function reject($id)
    {
        $leave = Leave::find($id);
        $leave->status = "Rejected";
        $leave->save();

        return redirect('/view-leaves')->with('success', 'Leave Rejected');
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
        $this->validate($request, [
            'type_id' => 'required',
            'from' => 'required|date|after:now',
            'to' => ' required|date|after:from',
            'reason' => 'required'
        ]);

        $leave = new Leave;
        $leave->employee_id = Auth::user()->employee->id;
        $leave->user_id = Auth::user()->id;
        $leave->type_id = $request->input('type_id');
        $leave->from = $request->input('from');
        $leave->to = $request->input('to');
        $leave->reason = $request->input('reason');
        $leave->status = "Pending...";
        $leave->save();

        return redirect('/my-leaves')->with('success', 'Application Submited');
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
        $leave = Leave::find($id);
        $leave->delete();
        
        return redirect('/my-leaves')->with('success', 'Leave Request Removed');
    }

    public function oldArchive()
    {
        $leaves = Leave::orderBy('from', 'desc')->paginate(20);
        return view('pages.leave.old_archive')->with('leaves', $leaves);
    }
}
