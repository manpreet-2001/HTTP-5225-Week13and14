@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 style="margin: 0; color: #333;">Add New Course</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="professor_id" class="form-label">Professor (Optional)</label>
                <select class="form-control" id="professor_id" name="professor_id">
                    <option value="">Select a professor</option>
                    @foreach($professors as $professor)
                        <option value="{{ $professor->id}" {{ old('professor_id') == $professor->id ? 'selected' : '' }}>
                            {{ $professor->name }}
                        </option>
                    @endforeach
                </select>
                <small style="color: #666; display: block; margin-top: 5px;">Only professors not currently teaching a course are shown</small>
            </div>
            
            <div style="margin-top: 25px;">
                <button type="submit" class="btn btn-success">Create Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 