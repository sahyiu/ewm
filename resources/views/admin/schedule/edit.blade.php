
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Edit Schedule</h1>

        <form method="POST" action="{{ route('admin.schedule.update', $schedule->id) }}">
    @csrf
    @method('PUT')  <!-- This tells Laravel to treat this as a PUT request -->
    
    <div>
        <label for="CourseID">Course ID</label>
        <input type="text" name="CourseID" id="CourseID" value="{{ $schedule->CourseID }}" required>
    </div>
    <div>
        <label for="InstructorID">Instructor ID</label>
        <input type="text" name="InstructorID" id="InstructorID" value="{{ $schedule->InstructorID }}" required>
    </div>
    <div>
        <label for="Day">Day</label>
        <input type="text" name="Day" id="Day" value="{{ $schedule->Day }}" required>
    </div>
    <div>
        <label for="Time">Start Time</label>
        <input type="time" name="Time" id="Time" value="{{ $schedule->Time }}" required>
    </div>
    <div>
        <label for="Time_end">End Time</label>
        <input type="time" name="Time_end" id="Time_end" value="{{ $schedule->Time_end }}" required>
    </div>
    <button type="submit">Update Schedule</button>
</form>

    </div>
@endsection
