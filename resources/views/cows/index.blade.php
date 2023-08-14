<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cows CRUD Index</title>
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="grid">
            <div class="col-lg-12 text-center">
                <h2>Cows CRUD</h2>
            </div>
            <div>
                <a href="{{ route('cows.create') }}" class="btn btn-success">Create Cow</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Cow gene</th>
                    <th>Cow birth</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach($cows as $cow)
                    <tr>
                        <td>{{ $cow->cow_id }}</td>
                        <td>{{ $cow->cow_gene }}</td>
                        <td>{{ $cow->cow_birth }}</td>
                        <td>
                            <form action="{{ route('cows.destroy', $cow->cow_id) }}" method="POST">
                                <a href="{{ route('cows.edit', $cow->cow_id) }}" class="btn btn-warning" >Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div >
        {!! $cows->links('pagination::bootstrap-5') !!}
    </div>
</body>
</html>
