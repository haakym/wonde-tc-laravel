@extends('layout')

@section('content')
    <h1>Teachers</h1>
    <p>Select a teacher to view classes.</p>
    <form action="" method="GET">
        <label for="id">
            Teachers:
        </label>
        <select name="id" required>
            <option value="">Select a teacher</option>
            @forelse($teachers as $teacher)
                <option value="{{ $teacher->id }}">
                    {{ $teacher->forename }} {{ $teacher->surname }}
                </option>
            @empty
                <option value="">No teachers were found.</option>
            @endforelse
        </select>
        <input type="submit" value="View">
    </form>
@endsection

@push('scripts')
    document.querySelector('select').addEventListener('change', function(e) {
        document.querySelector('form').action = '/teachers/' + e.target.value;
    });
@endpush
