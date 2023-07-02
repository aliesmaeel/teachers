<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
</head>
<body class="bodyStyle">
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-primary" style="float: right" href="/">Home</a>
            </div>
            <div class="pull-left">
                <h2>Dates</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('dates.create') }}"> Create Date</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Date ID </th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dates as $date)
            <tr>
                <td>{{ $date->id }}</td>
                <td>{{ $date->date }}</td>
                <td>
                    <form action="{{ route('dates.destroy',$date->id) }}" method="Post" >
                        <a class="btn btn-primary" href="{{ route('dates.edit',$date->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure Noreeee  😀 ???')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script>

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
