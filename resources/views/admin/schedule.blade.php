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
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white p-4">
            <!-- User Profile Section -->
    <div class="flex flex-col items-center mb-6">
        <!-- User Profile Picture -->
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-700 mb-3">
            <img 
                src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}" 
                alt="Profile Picture" 
                class="w-full h-full object-cover"
            >
        </div>
        <!-- User Name -->
        <div class="text-center">
            <h3 class="text-lg font-bold">{{ Auth::user()->name ?? 'Guest' }}</h3>
            <p class="text-sm text-gray-400">{{ Auth::user()->email ?? '' }}</p>
        </div>
    </div>
        <h2 class="text-2xl mb-4">Menu</h2>
        <ul>
        <li class="mb-4">
        <a href="{{ route('admin.releaseStudentNo') }}" 
           class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
            RELEASE STUDENT No. RANGE</a></li>
    <li class="mb-4">
        <a href="{{ route('admin.schedule') }}" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        SCHEDULE</a></li>
    <li class="mb-4">
        <a href="{{ route('admin.instructor') }}" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        INSTRUCTORS</a></li>
    <li class="mb-4">
        <a href="{{ route('admin.instructor') }}" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        COURSES</a></li>
    <li class="mb-4">
        <a href="{{ route('admin.instructor') }}" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        USERS</a></li>
    <li class="mb-4">
        <a href="{{ route('admin.billings') }}" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        BILLINGS</a></li>
            </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 border border-gray-300 p-4">
        <h1 class="text-4xl font-semibold mb-4">Student Schedule</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Schedule Search Form -->
        <form method="GET" action="{{ route('admin.schedule') }}" class="mb-6"> <!-- Add margin-bottom -->
            <input type="text" name="search" placeholder="Search by name or ID" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>

        <a href="{{ route('admin.schedule.new') }}">
            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow mb-4 flex items-center justify-center">
                <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                <span class="relative text-black group-hover:text-white">Create New Schedule</span>
            </button>
        </a>


    
        <table class="mb-8">
        <thead>
    <tr class="bg-transparent">
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Student ID</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Schedule ID</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Course ID</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Instructor ID</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Day</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Time</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Year Level</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Section</th>
        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800 text-xl">Edit</th>
    </tr>
</thead>

    <tbody>
        @forelse($schedules as $schedule)
            <tr>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->StudentID }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->ID }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->CourseID }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->InstructorID }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->Day }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->Time }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->YearLevel }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $schedule->Section }}</td>
                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">
                    <a href="{{ route('admin.schedule.edit', $schedule->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="p-4 align-middle [&:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10 text-center text-sm text-gray-500">No schedules found</td>
            </tr>
        @endforelse
    </tbody>
</table>



    </div>
</div>
</body>
</html>
