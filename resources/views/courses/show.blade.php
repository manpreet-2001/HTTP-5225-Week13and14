@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 style="margin: 0; color: #333;">Course Details</h2>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label"><strong>Course Name:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $course->name }}</p>
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Description:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $course->description }}</p>
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Professor:</strong></label>
            @if($course->professor)
                <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px; color: #007bff; font-weight: bold;">
                    {{ $course->professor->name }}
                </p>
            @else
                <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px; color: #666; font-style: italic;">
                    No professor assigned
                </p>
            @endif
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Enrolled Students:</strong></label>
            @if($course->students->count() > 0)
                <div style="margin-top: 10px;">
                    @foreach($course->students as $student)
                        <div style="background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 10px; margin-bottom: 8px; border-radius: 5px;">
                            <strong>{{ $student->fname }} {{ $student->lname }}</strong>
                            <span style="color: #666; margin-left: 10px;">{{ $student->email }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px; color: #666; font-style: italic;">
                    No students enrolled
                </p>
            @endif
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Created:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $course->created_at->format('F j, Y') }}</p>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit Course</a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
        </div>
    </div>
</div>
@endsection 