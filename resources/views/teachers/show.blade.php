@extends('layout')

@section('content')
    <nav>
        <a href="{{ route('home') }}">
            Select a different teacher
        </a>
    </nav>

    <h1>{{ $teacher->forename }} {{ $teacher->surname }}</h1>
    
    <h2>Classes</h2>

    <ul>
        @forelse($teacher->classes->data as $class)
            <li>
                <a href="{{ route('classes.show', $class->name) }}">
                    {{ $class->name }}
                </a>
            </li>
        @empty
            <li>No classes</li>
        @endforelse
    </ul>
    
@endsection
