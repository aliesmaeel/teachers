<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Teacher;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function PrintData()
    {
        $rooms= Room::all();

        $tables= TeacherRoom::query()
            ->get()->groupBy('teacher_id')->toArray();
        $teachers=Teacher::all();
        return view('print.index',compact('rooms','tables','teachers'));
    }
}
