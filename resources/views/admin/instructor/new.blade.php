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
        <div class="flex-1 mx-auto mt-10 px-6 bg-white shadow-lg rounded-lg max-w-3xl">
            <div class="mb-4">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="inline-block text-blue-500 hover:text-blue-700 mb-4">
                    ← Back to Previous Page
                </a>
            </div>
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add New Instructor Form -->
            <h2 class="text-2xl font-bold mb-5">Add New Instructor</h2>
            <form method="POST" action="{{ route('admin.instructor.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="FirstName" class="block text-gray-700">First Name</label>
                    <input type="text" name="FirstName" placeholder="First Name" required class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label for="LastName" class="block text-gray-700">Last Name</label>
                    <input type="text" name="LastName" placeholder="Last Name" required class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label for="Email" class="block text-gray-700">Email</label>
                    <input type="email" name="Email" placeholder="Email" required class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label for="ContactNumber" class="block text-gray-700">Contact Number</label>
                    <input type="text" name="ContactNumber" placeholder="Contact Number" required class="w-full p-2 border rounded">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Add Instructor
                </button>
            </form>
        </div>
    </div>
</body>
</html>
