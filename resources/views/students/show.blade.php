<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Student Details</h1>
    <p><strong>Name:</strong> {{ $student->fname }} {{ $student->lname }} <br></p>
    <p><strong>Email:</strong> {{ $student->email }}</p> <br>
    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>
