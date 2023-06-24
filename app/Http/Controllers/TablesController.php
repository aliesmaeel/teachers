<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Teacher;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{
    public function index()
    {
        $rooms= Room::all();

        $tables= TeacherRoom::query()
            ->get()->groupBy('teacher_id')->toArray();
        $teachers=Teacher::all();
        return view('tables.index',compact('rooms','tables','teachers'));
    }
    public function attachTeacherToRoom(Request $request)
    {
        $teacherRoom=TeacherRoom::where('id',$request->teacherrommId)
                        ->update([
                           'room_id'=>$request->room_id,
                           'teacher_id'=>$request->teacher_id,
                        ]);
        $rooms= Room::whereHas('teachers',function ($query){})->get();
        $teachers=Teacher::all();

        return redirect('/tables');
    }

    public function attachTeacherToRoomCreate(Request $request)
    {
        $teacherRoom=TeacherRoom::create([
                           'room_id'=>$request->room_id,
                           'teacher_id'=>$request->teacher_id,
                            'hour'=>$request->hour,
                            'day'=>$request->day
                        ]);

        return redirect('/tables');
    }

    public  function editAttachTeacherToRoom(Request  $request)
    {
        $teacherInRoom=TeacherRoom::where('teacher_id',$request->teacher)
                ->where('room_id',$request->room)
                ->where('hour',$request->hour)
                ->where('day',$request->day)
                ->first();

        $rooms=Room::all();
        $teachers=Teacher::all();
        return view('tables.edit')->with('teacherInRoom',$teacherInRoom)
                ->with('teachers',$teachers)->with('rooms',$rooms);

    }

    public function postAttachTeacherToRoom(Request $request)
    {
        $teacherInRoom=TeacherRoom::where('teacher_id',$request->teacher)
            ->where('room_id',$request->room)
            ->where('hour',$request->hour)
            ->where('day',$request->day)
            ->update([
                'room_id'=>$request->room_id,
                'teacher_id'=>$request->teacher_id,
                'hour'=>$request->hour,
                'day'=>$request->day
            ]);

        return redirect('/tables');
    }

    public function deleteAttachTeacherToRoom(Request $request)
    {

        $teacherInRoom=TeacherRoom::where('teacher_id',$request->teacher)
            ->where('room_id',$request->room)
            ->where('hour',$request->hour)
            ->where('day',$request->day)
            ->delete();
        return redirect('/tables');

    }

    public function deleteAllData()
    {
        TeacherRoom::truncate();
        return redirect('/tables');
    }




}
