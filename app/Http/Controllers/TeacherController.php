<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $numberOfTeachers=Teacher::get()->count();
        return view('teachers.index', compact('teachers','numberOfTeachers'));
    }


    public function create()
    {
        return view('teachers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Teacher::create($request->post());

        return redirect()->route('teachers.index')->with('success','Teacher has been created successfully.');
    }



    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $teacher->fill($request->post())->save();

        return redirect()->route('teachers.index')->with('success','Teacher Has Been updated successfully');
    }


    public function destroy(Teacher $Teacher)
    {
        $Teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher has been deleted successfully');
    }
}
