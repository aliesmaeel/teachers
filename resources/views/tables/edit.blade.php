<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Teacher In a Room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-primary" style="float: right" href="/">Home</a>
            </div>

            <div class="pull-left">
                <h2>Edit Teacher in a Room</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/tables') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ url('/editAttachTeacherToRoom/'.$teacherInRoom->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                            <p style="font-weight: bold">Room</p>
                            <select name="room_id" style="width: 100%; padding: 5px">
                                <option  selected>----</option>
                                @foreach($rooms as $room)
                                    <option @if(\App\Models\Room::where('id',$teacherInRoom->room_id)->first()->id == $room->id) selected @endif  value="{{$room->id}}">{{$room->number}}</option>
                                @endforeach
                            </select>
                            <p style="margin-top: 2px; margin-bottom: 2px;"><strong>Teacher</strong></p>
                            <select name="teacher_id" style="width: 100%;padding: 5px">
                                <option selected>----</option>
                                @foreach($teachers as $teacher)
                                    <option @if($teacher->id ===$teacherInRoom->teacher_id) selected @endif value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                            <p> Hour

                                <select name="hour" style="width: 100%;padding: 5px">
                                    @foreach($hours as $hour)
                                        <option
                                            @if($hour->hour== $teacherInRoom->hour)
                                            selected @endif value="{{$hour->hour}}">{{$hour->hour}}</option>
                                    @endforeach
                                </select>

                            </p>

                            <p> day
                                <select name="day" style="width: 100%;padding: 5px">
                                    @foreach($days as $day)
                                        <option
                                            @if($day->date== $teacherInRoom->day) selected @endif   value="{{$day->date}}">{{$day->date}}</option>
                                    @endforeach
                                </select>
                            </p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </form>
</div>
</body>

</html>
