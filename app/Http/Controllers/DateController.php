<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::all();
        return view('dates.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required |unique:dates',
        ]);

        Date::create($request->post());

        return redirect()->route('dates.index')->with('success','date has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Date $date)
    {
        return view('dates.edit',compact('date'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Date $date)
    {
        $request->validate([
            'date' => 'required |unique:dates',
        ]);

        $date->fill($request->post())->save();

        return redirect()->route('dates.index')->with('success','Date Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Date $date)
    {
        $date->delete();
        return redirect()->route('dates.index')->with('success','date has been deleted successfully');
    }
}
