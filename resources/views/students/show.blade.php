<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Student Details - Laravel CRUD</title>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="card shadow-lg text-center" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h2 class="card-title text-primary mb-4">{{ $students->name }}</h2>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Email:</strong> {{ $students->email }}</li>
                <li class="list-group-item"><strong>Age:</strong> {{ $students->age }}</li>
                <li class="list-group-item"><strong>Address:</strong> {{ $students->address }}</li>
            </ul>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('students.edit', $students->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('students.destroy', $students->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

</body>
</html>