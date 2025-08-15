<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .navbar {
            background-color: #333;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            padding: 5px 10px;
        }
        
        .navbar a:hover {
            background-color: #555;
            border-radius: 3px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 3px;
            margin: 2px;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-info { background-color: #17a2b8; color: white; }
        
        .btn:hover {
            opacity: 0.8;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }
        
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
        }
        
        .card-header {
            background-color: #f8f9fa;
            padding: 10px 20px;
            margin: -20px -20px 20px -20px;
            border-bottom: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
        }
        
        .text-center { text-align: center; }
        .text-muted { color: #6c757d; }
        .mb-3 { margin-bottom: 15px; }
        .mb-4 { margin-bottom: 20px; }
        .mt-3 { margin-top: 15px; }
        .mt-5 { margin-top: 25px; }
        .py-5 { padding: 25px 0; }
        .me-2 { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="{{ route('students.index') }}">Students</a>
            <a href="{{ route('courses.index') }}">Courses</a>
            <a href="{{ route('professors.index') }}">Professors</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
