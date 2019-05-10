<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::orderBy('id', 'desc')->paginate(10);
        return view('pages.campus.view_campus')->with('campuses', $campuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.campus.new_campus');
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

        $campus = new Campus;
        $campus->name = $request->input('name');
        $campus->head = $request->input('head');
        $campus->description = $request->input('description');
        $campus->save();

        return redirect('/view-campus')->with('success', $campus->name.' - New Campus Added');
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
        $campus = Campus::find($id);
        return view('pages.campus.edit_campus')->with('campus', $campus);
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

        $campus = Campus::find($id);
        $campus->name = $request->input('name');
        $campus->head = $request->input('head');
        $campus->description = $request->input('description');
        $campus->save();

        return redirect('/view-campus')->with('success', $campus->name.'- Campus Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);
        $name = $campus->name;
        $campus->delete();

        return redirect('/view-campus')->with('success', $name.' - Campus Deleted');
    }

    public function dashboard() 
    {
        $campuses = Campus::all();
        return view('pages.dashboard')->with('campuses', $campuses);
    }
}
