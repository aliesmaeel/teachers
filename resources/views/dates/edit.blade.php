<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>edit dates</title>
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
                <h2>Edit Date</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dates.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('dates.update',$date->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Number:</strong>
                    <input type="text" name="date" class="form-control" placeholder="Company Email"
                           value="{{ $date->date }}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>

</html>
