<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <!-- User Profile Section -->
            <div class="flex flex-col items-center mb-6">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-700 mb-3">
                    <img 
                        src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}" 
                        alt="Profile Picture" 
                        class="w-full h-full object-cover"
                    >
                </div>
                <div class="text-center">
            <h3 class="text-lg font-bold">{{ Auth::user()->name ?? 'Guest' }}</h3>
            <p class="text-sm text-gray-400">{{ Auth::user()->email ?? '' }}</p>
        </div>
    </div>
        <h2 class="text-2xl mb-4">Menu</h2>
        <ul>
            <li>
                <a href="{{ route('admin.releaseStudentNo') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    RELEASE STUDENT No. RANGE
                </a>
            </li>

            <li>
                <a href="{{ route('admin.schedule') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    SCHEDULE STUDENT
                </a>
            </li>

            <li>
                <a href="{{ route('admin.schedule') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    INSTRUCTORS
                </a>
            </li>

            <li>
                <a href="{{ route('admin.schedule') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    COURSES
                </a>
            </li>

            <li>
                <a href="{{ route('admin.schedule') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    USERS
                </a>
            </li>

            <li>
                <a href="{{ route('admin.billings') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    BILLINGS
                </a>
            </li>
        </ul>
    </div>


        <!-- Main Content -->
        <div class="flex-1 mx-auto mt-10 px-6 bg-white shadow-lg rounded-lg max-w-3xl">
            <div class="mb-4">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="inline-block text-blue-500 hover:text-blue-700 mb-4">
                    ← Back to Previous Page
                </a>
            </div>

            <h2 class="text-2xl font-bold mb-5">Create New Schedule</h2>
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.schedule.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="course_id" class="block text-gray-700">Course</label>
                    <select name="course_id" id="course_id" class="w-full p-2 border rounded">
                        <option value="">-- Select Course --</option>
                        @foreach (\App\Models\Course::all() as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="instructor_id" class="block text-gray-700">Instructor</label>
                    <select name="instructor_id" id="instructor_id" class="w-full p-2 border rounded">
                        <option value="">-- Select Instructor --</option>
                        @foreach (\App\Models\Instructor::all() as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                    @error('instructor_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="day" class="block text-gray-700">Day</label>
                    <select name="day" id="day" class="w-full p-2 border rounded">
                        <option value="">-- Select Day --</option>
                        <option value="Mon">Monday</option>
                        <option value="Tue">Tuesday</option>
                        <option value="Wed">Wednesday</option>
                        <option value="Thu">Thursday</option>
                        <option value="Fri">Friday</option>
                        <option value="Sat">Saturday</option>
                    </select>
                    @error('day')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700">Start Time</label>
                    <input type="time" name="time" id="time" class="w-full p-2 border rounded" value="{{ old('time') }}">
                    @error('time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time_end" class="block text-gray-700">End Time</label>
                    <input type="time" name="time_end" id="time_end" class="w-full p-2 border rounded" value="{{ old('time_end') }}">
                    @error('time_end')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Create Schedule
                </button>
            </form>
        </div>
    </div>
</body>
</html>
