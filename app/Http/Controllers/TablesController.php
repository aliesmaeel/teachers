<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Hour;
use App\Models\Room;
use App\Models\Teacher;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TablesController extends Controller
{
    public function index()
    {
        $rooms= Room::all();
        $teachers=Teacher::all();
        $hours=Hour::all();
        $days=Date::all();

        $tables= TeacherRoom::query()
            ->get()->groupBy('teacher_id')->toArray();

        return view('tables.index',compact('days','hours','rooms','tables','teachers'));
    }


    public function attachTeacherToRoomCreate(Request $request)
    {
        $user=$request->teacher_id;
        $unique=TeacherRoom::where('teacher_id',$user)
            ->where('room_id',$request->room_id)
            ->where('hour',$request->hour)
            ->where('day',$request->day)
            ->first();
       if($unique)
       {
           Session::flash('message', 'لايمكن وضع استاذ في قاعة في نفس اليوم وفي نفس التاريخ مرتين ');
           return redirect('/tables');
       }
        $unique=TeacherRoom::where('teacher_id',$user)
            ->where('hour',$request->hour)
            ->where('day',$request->day)
            ->first();

        if($unique)
        {
            Session::flash('message', 'لايمكن وضع استاذ في نفس اليوم وفي نفس التاريخ في قاعتين مختلفتين ');
            return redirect('/tables');
        }


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
        $teacherInRoom=TeacherRoom::where('id',$request->id)
                ->first();

        $rooms=Room::all();
        $teachers=Teacher::all();
        $days=Date::all();
        $hours=Hour::all();

        return view('tables.edit')
            ->with('teacherInRoom',$teacherInRoom)
            ->with('teachers',$teachers)
            ->with('rooms',$rooms)
            ->with('hours',$hours)
            ->with('days',$days);

    }

    public function postAttachTeacherToRoom(Request $request)
    {
        $user=$request->teacher_id;
        $teacherInRoom=TeacherRoom::where('id',$request->id)
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

        $teacherInRoom=TeacherRoom::where('id',$request->id)
            ->delete();
        return redirect('/tables');

    }

    public function deleteAllData()
    {
        TeacherRoom::truncate();
        return redirect('/tables');
    }




}
