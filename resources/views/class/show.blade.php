@extends('layout')

@section('content')
    <nav>
        <a href="{{ route('teachers.show', $class->current()->lessons->data[0]->employee) }}">
            Return to teacher
        </a>
    </nav>

    <h1>Class: {{ $class->current()->name }}</h1>

    <h2>Lessons</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Day</th>
                <th>Start time</th>
                <th>End time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($class->current()->lessons->data as $lesson)
                <tr>
                    <td>{{ ucfirst($lesson->period->data->day) }}</td>
                    <td>{{ $lesson->period->data->start_time }}</td>
                    <td>{{ $lesson->period->data->end_time }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No lessons</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Students</h2>

    <ul>
        @forelse($class->current()->students->data as $student)
            <li>
                {{ $student->forename }} {{ $student->surname }}
            </li>
        @empty
            <li>No students</li>
        @endforelse
    </ul>

    
@endsection