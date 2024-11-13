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
        <h1>Edit Students</h1>

        <form action="{{ route ('students.update', $students->id)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $students->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $students->email}}" required>
            </div>
            <div class="form-group">
                <label for="name">Age</label>
                <input type="text" name="age" class="form-control" value="{{ $students->age}}" required>
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $students->address}}" required>
            </div> <br><br>
            <button type="submit" class="btn btn-success">Edit Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
</body>
</html>