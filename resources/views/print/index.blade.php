<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 10px">
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">

            </div>

            <div class="pull-left" style="width: 100%" >
                <h2>Tables</h2>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered " style="margin-top: 5px">
        <tbody >
        @foreach($tables as $key=>$value)
   <tr  style="border: 2px solid black">
       <th>{{\App\Models\Teacher::where('id',$key)->first()->name}}
    @foreach($value as $v)
        <td  style="border: 2px solid black">
           <p>  Room : {{\App\Models\Room::where('id',$v['room_id'])->first()->number}}</p>
            <p>  Hour : {{$v['hour']}}</p>
            <p> Day : {{$v['day']}}</p>
        </td>
       @endforeach
   </tr>
   </tr>
        @endforeach

        </tbody>
    </table>

</div>


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
