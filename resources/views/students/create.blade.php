<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Add Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <label>First Name:</label>
        <input type="text" name="fname" required><br>
        <label>Last Name:</label>
        <input type="text" name="lname" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
