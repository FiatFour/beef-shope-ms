<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <h2>Add Cow</h2>
        </div>
        <div>
        <a href="{{ route('cows.index') }}" class="btn btn-primary">
                    Back to index
                </a>
        </div>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('cows.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- security --}}
            <div class="row">
                <div class="col-md-12 my-1">
                    <b>Cow gene</b>
                    <input type="text" name="cow_gene" class="form-control" placeholder="Cow gene">
                    @error('cow_gene') {{-- check error --}}
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 my-1">
                    <b>Cow birth</b>
                    <input type="date" name="cow_birth">
                    @error('cow_birth') {{-- check error --}}
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 my-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
