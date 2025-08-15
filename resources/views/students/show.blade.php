@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 style="margin: 0; color: #333;">Student Details</h2>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label"><strong>First Name:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $student->fname }}</p>
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Last Name:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $student->lname }}</p>
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Email:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $student->email }}</p>
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Enrolled Courses:</strong></label>
            @if($student->courses->count() > 0)
                <div style="margin-top: 10px;">
                    @foreach($student->courses as $course)
                        <div style="background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; margin-bottom: 10px; border-radius: 5px;">
                            <h4 style="margin: 0 0 10px 0; color: #007bff;">{{ $course->name }}</h4>
                            <p style="margin: 0 0 8px 0; color: #666;">{{ $course->description }}</p>
                            @if($course->professor)
                                <p style="margin: 0; color: #28a745;"><strong>Professor:</strong> {{ $course->professor->name }}</p>
                            @else
                                <p style="margin: 0; color: #666; font-style: italic;">No professor assigned</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px; color: #666; font-style: italic;">No courses enrolled</p>
            @endif
        </div>
        
        <div class="form-group">
            <label class="form-label"><strong>Created:</strong></label>
            <p style="margin: 0; padding: 8px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 3px;">{{ $student->created_at->format('F j, Y') }}</p>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit Student</a>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
        </div>
    </div>
</div>
@endsection
