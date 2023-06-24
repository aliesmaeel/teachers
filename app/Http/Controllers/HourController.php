<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function index()
    {
        $hours = Hour ::all();
        return view('hours.index', compact('hours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'hour' => 'required |unique:hours',
        ]);


        Hour ::create($request->post());

        return redirect()->route('hours.index')->with('success','date has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hour $hour)
    {
        return view('hours.edit',compact('hour'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hour $hour)
    {
        $request->validate([
            'hour' => 'required |unique:hours',
        ]);

        $hour->fill($request->post())->save();

        return redirect()->route('hours.index')->with('success','Hour Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hour $hour)
    {
        $hour->delete();
        return redirect()->route('hours.index')->with('success','date has been deleted successfully');
    }
}
