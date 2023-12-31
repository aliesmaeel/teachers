<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">

</head>
<body class="bodyStyle" style="margin-top: 10px">


@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
@endif


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-primary" style="float: right;margin: 2px" href="/">Home</a>
                <a class="btn btn-warning" style="float: right;margin: 2px" target="_blank" href="/print">Print</a>
            </div>

            <div class="pull-left" style="width: 100%" >
                <h2>Tables</h2>
                <div class="row">
                    <div class="col-md-4 ">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#myModalCreate">Attach Teacher</a>
                    </div>
                    <div class="col-md-4 ">
                        <a class="btn btn-success" href="/generateRandomData">Generate Random Data</a>
                    </div>
                    <div class="col-md-4 ">
                        <a class="btn btn-warning" href="/flushAllData" onclick="return confirm('Are you sure You want to fush all data  😡 ???')"  >Remove all data</a>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered" style="margin-top: 5px">
        <tbody >
        @foreach($tables as $key=>$value)
   <tr>
       <th>{{\App\Models\Teacher::where('id',$key)->first()->name}}
    @foreach($value as $v)
        <td>
           <p>  Room : {{\App\Models\Room::where('id',$v['room_id'])->first()->number}}</p>
            <p>  Hour : {{$v['hour']}}</p>
            <p> Day : {{$v['day']}}</p>

            <form action="{{ url('/editAttachTeacherToRoom/'.$v['id']) }}" method="Post" >
                <a class="btn btn-success" href="{{ url('/editAttachTeacherToRoom/'.$v['id']) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure Noreeee  😀 ???')" class="btn btn-danger">Delete</button>
            </form>
        </td>
       @endforeach
   </tr>
   </tr>
        @endforeach

        </tbody>
    </table>

</div>


<form method="post" action="/attachTeacherToRoomCreate">
    @csrf
    <div id="myModalCreate" class="modal " role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Attach Teacher to Room</h4>
                </div>
                <div class="modal-body">
                    <p style="font-weight: bold">Room</p>
                    <select name="room_id" style="width: 100%; padding: 5px">
                        <option  selected>----</option>
                        @foreach($rooms as $room)
                            <option  value="{{$room->id}}">{{$room->number}}</option>
                        @endforeach
                    </select>
                    <p style="margin-top: 2px; margin-bottom: 2px;"><strong>Teacher</strong></p>
                    <select name="teacher_id" style="width: 100%;padding: 5px">
                        <option selected>----</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                    <p> Hour
                        <select name="hour" style="width: 100%;padding: 5px">
                            <option selected>----</option>
                            @foreach($hours as $hour)
                                <option value="{{$hour->hour}}">{{$hour->hour}}</option>
                        @endforeach
                        </select>
                    </p>
                    <p></p>
                    <p>
                        day
                        <select name="day" style="width: 100%;padding: 5px">
                            <option selected>----</option>
                            @foreach($days as $day)
                                <option value="{{$day->date}}">{{$day->date}}</option>
                            @endforeach
                        </select>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit Create</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    $(document).on("click", ".open-AddBookDialog", function () {
        var id = $(this).data('id');
        var oldteacherId = $(this).data('oldteacherid');
        var oldroomId = $(this).data('oldroomid');
        document.getElementById('hiddenId').value=id;
        document.getElementById('hiddenoldroomId').value=oldteacherId;
        document.getElementById('hiddenoldteacherId').value=oldroomId;
        console.log(id,oldteacherId,oldroomId)
    });

        const confirmAction = (e) => {
        e.preventDefault();
        if (response) {
        return false;
    } else {
        document.getElementById("formDelete").submit();
    }
    }

</script>
</body>
</html>
