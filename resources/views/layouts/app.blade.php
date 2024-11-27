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
            <h2 class="text-2xl mb-4">Menu</h2>
            <ul>
                <!-- ADMIN SIDE BAR ITEMS -->
                @can('view-admin-dashboard')
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
                    <a href="{{ route('admin.billings') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        BILLINGS
                    </a>
                </li>

                @endcan

                <!-- REGISTRAR SIDE REGISTRAR -->
                @can('view-registrar-dashboard')

                <li>
                    <a href="{{ route('registrar.dashboard') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        GENERATE COR
                    </a>
                </li>

                <li>
                    <a href="{{ route('registrar.dashboard') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        RETRIEVE SCHEDULE
                    </a>
                </li>

                <li>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">
                        STUDENT MENU 
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </li>


                <!-- Dropdown menu -->
                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                    <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">CREATE NEW RECORD</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">UPDATE RECORD</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">RETRIEVE RECORD</a>
                    </li>
                    </ul>
                </div>

                @endcan

                <!-- OFFICER SIDE BAR ITEMS -->
                @can('view-officer-dashboard')
                <li>
                    <a href="{{ route('officer.dashboard') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        CREATE NEW RECORD
                    </a>
                </li>

                <li>
                    <a href="{{ route('officer.dashboard') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        UPDATE OLD RECORD
                    </a>
                </li>

                @endcan

                <!-- Add more items here -->
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

</html>
