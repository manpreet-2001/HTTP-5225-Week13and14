@extends('layouts.app')

@section('content')
<div style="margin-bottom: 20px;">
    <h1 style="color: #333; margin-bottom: 10px;">All Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

@if($students->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 20%;">Name</th>
                <th style="width: 25%;">Email</th>
                <th style="width: 35%;">Enrolled Courses</th>
                <th style="width: 15%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td><strong>{{ $student->fname }} {{ $student->lname }}</strong></td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @if($student->courses->count() > 0)
                            @foreach($student->courses as $course)
                                <span style="display: inline-block; background-color: #e9ecef; padding: 4px 10px; margin: 2px; border-radius: 12px; font-size: 12px;">
                                    {{ $course->name }}
                                    @if($course->professor)
                                        <small style="color: #666;">({{ $course->professor->name }})</small>
                                    @endif
                                </span>
                            @endforeach
                        @else
                            <span style="color: #666; font-style: italic;">No courses enrolled</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info" style="margin: 2px;">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning" style="margin: 2px;">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin: 2px;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div style="text-align: center; padding: 40px; background-color: #f9f9f9; border: 1px solid #ddd;">
        <h3 style="color: #666; margin-bottom: 10px;">No students found</h3>
        <p style="color: #666; margin-bottom: 20px;">Get started by adding your first student.</p>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>
@endif
@endsection