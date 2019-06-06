<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveType;

class LeaveTypesController extends Controller
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
        $types = LeaveType::orderBy('id', 'desc')->paginate(10);
        return view('pages.leave.leave_types')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.leave.add_leave_type');
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

        ]);

        $types = new LeaveType;
        $types->name = $request->input('name');
        $types->description = $request->input('description');
        $types->allowance = $request->input('allowance');
        $types->save();
        
        return redirect('/leave-types')->with('success', $types->name.' - Leave Type Added');
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
     * @recturn \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = LeaveType::find($id);
        return view('pages.leave.edit_type')->with('type', $type);
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

        ]);

        $types = LeaveType::find($id);
        $types->name = $request->input('name');
        $types->description = $request->input('description');
        $types->allowance = $request->input('allowance');
        $types->save();
        
        return redirect('/leave-types')->with('success', $types->name.' - Leave Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $type = LeaveType::find($id);
        $name = $type->name;
        $type->delete();

        return redirect('/leave-types')->with('success', $name.' - Leave Type Deleted');
    }
}
