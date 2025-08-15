@extends('layouts.app')

@section('content')
<div style="margin-bottom: 20px;">
    <h1 style="color: #333; margin-bottom: 10px;">All Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-success">Add Course</a>
</div>

@if($courses->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 20%;">Course Name</th>
                <th style="width: 30%;">Description</th>
                <th style="width: 20%;">Professor</th>
                <th style="width: 10%;">Students</th>
                <th style="width: 15%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $index => $course)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td><strong>{{ $course->name }}</strong></td>
                    <td>{{ Str::limit($course->description, 100) }}</td>
                    <td>
                        @if($course->professor)
                            <span style="color: #007bff; font-weight: bold;">{{ $course->professor->name }}</span>
                        @else
                            <span style="color: #666; font-style: italic;">Not assigned</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <span style="background-color: #28a745; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
                            {{ $course->students->count() }} enrolled
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-info" style="margin: 2px;">View</a>
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning" style="margin: 2px;">Edit</a>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
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
        <h3 style="color: #666; margin-bottom: 10px;">No courses found</h3>
        <p style="color: #666; margin-bottom: 20px;">Get started by adding your first course.</p>
        <a href="{{ route('courses.create') }}" class="btn btn-success">Add Course</a>
    </div>
@endif
@endsection 