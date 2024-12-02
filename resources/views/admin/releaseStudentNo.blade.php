<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Release Student Number</title>

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
                <!-- ADMIN SIDE BAR ITEMS -->
                @can('view-admin-dashboard')
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

                @endcan
        </div>
                    <!-- Main Content -->
                    <div class="flex-1">
            @include('layouts.navigation')<main>
            <div class="container mx-auto p-4">
        <h1 class="text-4xl font-semibold mb-4">Release Student Numbers</h1>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Errors -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form for releasing student numbers -->
        <form method="POST" action="{{ route('admin.releaseStudentNo') }}">
            @csrf <!-- CSRF token for security -->
            <div class="mb-4">
                <label for="start_student_no" class="block text-sm font-medium text-gray-700">Start Student Number</label>
                <input type="number" name="start_student_no" id="start_student_no" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="end_student_no" class="block text-sm font-medium text-gray-700">End Student Number</label>
                <input type="number" name="end_student_no" id="end_student_no" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Release Numbers
            </button>
        </form>

        <!-- Table for displaying enrollments -->
        <div class="mt-8">
            <h2 class="text-4xl font-semibold mb-4 mt-4">Enrollees</h2>

            <table class="table-auto border-collapse w-full text-left">
    <thead>
        <tr class="bg-transparent">
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Student ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Last Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">First Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Course</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Year Level</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Semester</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Enrollment Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($enrollees as $enrollment)
            <tr>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->id }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->StudentID ?? 'N/A' }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->LastName }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->FirstName }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->Course }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->YearLevel }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ $enrollment->Semester }}</td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10">{{ \Carbon\Carbon::parse($enrollment->EnrollmentDate)->format('Y-m-d') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="border border-gray-400 px-4 py-2 text-center">No enrollments found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
            </main>
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
      

            <!-- Page Content -->
            
        
</body>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

</html>
