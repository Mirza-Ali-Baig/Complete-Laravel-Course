<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>File Upload</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }} <br>
{{--            <a href="{{ asset('storage/' . session('path')) }}">Download File</a>--}}
            <img src="{{asset('storage/' . session('path'))}}" width="200" height="200" alt="">
        </div>
    @endif
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose File</label>
            <input type="file" class="form-control" name="file" id="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div class="row">
        @forelse($images as $image)
            <div class="col-md-4 mb-4">
                <img src="{{asset('storage/'.$image->path)}}" alt="" class="img-fluid">
            </div>
        @empty
            <p class="text-center">No images found</p>
        @endforelse
    </div>
</div>
</body>
</html>
