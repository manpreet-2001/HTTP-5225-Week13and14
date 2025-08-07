@extends('layouts.app')

@section('content')
    <h1>All Students</h1>
    <a href="{{ route('students.create') }}">Add Student</a>

    <ul>
        @foreach ($students as $student)
            <li>
                {{ $student->fname }} {{ $student->lname }} ({{ $student->email }}) <br>
                <a href="{{ route('students.show', $student) }}">View</a>
                <a href="{{ route('students.edit', $student) }}">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection