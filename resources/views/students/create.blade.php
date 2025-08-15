@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 style="margin: 0; color: #333;">Add New Student</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}" required>
            </div>
            
            <div class="form-group">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Select Courses</label>
                @if($courses->count() > 0)
                    <div style="max-height: 200px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 3px; background-color: #f9f9f9;">
                        @foreach($courses as $course)
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer; margin: 0;">
                                    <input type="checkbox" name="course_ids[]" value="{{ $course->id}" 
                                           {{ in_array($course->id, old('course_ids', [])) ? 'checked' : '' }}
                                           style="margin-right: 10px;">
                                    <div>
                                        <strong>{{ $course->name }}</strong>
                                        @if($course->professor)
                                            <span style="color: #666; margin-left: 10px;">(Prof. {{ $course->professor->name }})</span>
                                        @endif
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="color: #666; font-style: italic; margin: 10px 0;">No courses available. Please create courses first.</p>
                @endif
            </div>
            
            <div style="margin-top: 25px;">
                <button type="submit" class="btn btn-primary">Create Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
