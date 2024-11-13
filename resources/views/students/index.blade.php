<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Students List</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add New Student</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->age }}</td>
    <td>{{ $student->address }}</td>
    <td>
        <div class="d-flex gap-2">
            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </td>
</tr>
                @endforeach
</tbody>
        </table> 
    </div>
</body>
</html>