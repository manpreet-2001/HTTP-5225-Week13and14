<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <label>First Name:</label>
        <input type="text" name="fname" value="{{ $student->fname }}" required><br>
        <label>Last Name:</label>
        <input type="text" name="lname" value="{{ $student->lname }}" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
