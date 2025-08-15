@extends('layouts.app')

@section('content')
<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #333; margin-bottom: 10px;">Welcome to Student Management System</h1>
    <p style="color: #666; font-size: 18px;">A simple platform for managing students, courses, and professors</p>
</div>

<div style="display: flex; gap: 20px; margin-bottom: 30px;">
    <div style="flex: 1; border: 1px solid #ddd; padding: 20px; text-align: center; background-color: #f9f9f9;">
        <h3 style="color: #007bff; margin-bottom: 10px;">Students</h3>
        <p style="color: #666; margin-bottom: 15px;">Manage student information and track their progress.</p>
        <a href="{{ route('students.index') }}" class="btn btn-primary">Manage Students</a>
    </div>

    <div style="flex: 1; border: 1px solid #ddd; padding: 20px; text-align: center; background-color: #f9f9f9;">
        <h3 style="color: #28a745; margin-bottom: 10px;">Courses</h3>
        <p style="color: #666; margin-bottom: 15px;">Create and manage courses with descriptions.</p>
        <a href="{{ route('courses.index') }}" class="btn btn-success">Manage Courses</a>
                </div>

    <div style="flex: 1; border: 1px solid #ddd; padding: 20px; text-align: center; background-color: #f9f9f9;">
        <h3 style="color: #17a2b8; margin-bottom: 10px;">Professors</h3>
        <p style="color: #666; margin-bottom: 15px;">View professor information and details.</p>
        <a href="{{ route('professors.index') }}" class="btn btn-info">View Professors</a>
                </div>
        </div>

<div style="text-align: center; padding: 20px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
    <h4 style="color: #333; margin-bottom: 10px;">Getting Started</h4>
    <p style="color: #666; margin: 0;">
        Start by adding students and courses to build your academic database. 
        Use the navigation menu above to access different sections.
    </p>
</div>
@endsection 