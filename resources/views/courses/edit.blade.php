@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 style="margin: 0; color: #333;">Edit Course</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $course->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="professor_id" class="form-label">Professor</label>
                <select class="form-control" id="professor_id" name="professor_id">
                    <option value="">No professor assigned</option>
                    @foreach($professors as $professor)
                        <option value="{{ $professor->id}" {{ old('professor_id', $course->professor_id) == $professor->id ? 'selected' : '' }}>
                            {{ $professor->name }}
                            @if($professor->course && $professor->id != $course->professor_id)
                                (Currently teaching: {{ $professor->course->name }})
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div style="margin-top: 25px;">
                <button type="submit" class="btn btn-warning">Update Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 