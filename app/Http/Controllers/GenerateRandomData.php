<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Hour;
use App\Models\Room;
use App\Models\Teacher;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenerateRandomData extends Controller
{
    public function generateRandomData()
    {
       $rooms= Room::select('id')->get()->toArray();
       $dates=Date::select('date')->get()->toArray();
       $teachers=Teacher::select('id')->get()->toArray();
       $hours=Hour::select('hour')->get()->toArray();

       // dd($dates[array_rand($dates)]['date']);
      foreach ($teachers as $teacher)
      {
          for($i=0 ; $i<3;$i++)
          {
              TeacherRoom::create([
                  'teacher_id'=>$teacher['id'],
                  'room_id'=>$rooms[array_rand($rooms)]['id'],
                  'hour'=>$hours[array_rand($hours)]['hour'],
                  'day'=>$dates[array_rand($dates)]['date'],
              ]);
          }
      }

      return redirect('/tables');

    }
}
