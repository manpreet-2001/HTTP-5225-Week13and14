@extends('layouts.app')

@section('content')
<div style="margin-bottom: 20px;">
    <h1 style="color: #333; margin-bottom: 10px;">All Professors</h1>
</div>

@if($professors->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10%;">#</th>
                <th style="width: 40%;">Professor Name</th>
                <th style="width: 35%;">Teaching Course</th>
                <th style="width: 15%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professors as $index => $professor)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td><strong>{{ $professor->name }}</strong></td>
                    <td>
                        @if($professor->course)
                            <span style="color: #007bff; font-weight: bold;">{{ $professor->course->name }}</span>
                        @else
                            <span style="color: #666; font-style: italic;">No course assigned</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if($professor->isTeaching())
                            <span style="background-color: #28a745; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
                                Teaching
                            </span>
                        @else
                            <span style="background-color: #6c757d; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
                                Available
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div style="text-align: center; padding: 40px; background-color: #f9f9f9; border: 1px solid #ddd;">
        <h3 style="color: #666; margin-bottom: 10px;">No professors found</h3>
        <p style="color: #666; margin-bottom: 20px;">Professors will appear here after seeding the database.</p>
    </div>
@endif
@endsection 