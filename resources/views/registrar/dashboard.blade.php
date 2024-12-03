<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8 p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Total Students -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h5 class="text-2xl font-bold text-white mb-4">Total Students</h5>
                @php
                    $all_student = DB::table('students')->count('StudentID');
                @endphp
                <p class="text-4xl font-semibold text-white">{{ $all_student }}</p>
            </div>

            <!-- Total Instructors -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h5 class="text-2xl font-bold text-white mb-4">Total Instructors</h5>
                @php
                    $all_teacher = DB::table('instructors')->count('id');
                @endphp
                <p class="text-4xl font-semibold text-white">{{ $all_teacher }}</p>
            </div>

            <!-- Department Counts -->
            @php
                $course = [
                    'BSCS' => DB::table('students')->where('Course', 1)->count('RegStatus'),
                    'BSIT' => DB::table('students')->where('Course', 2)->count('RegStatus'),
                    'BSBM' => DB::table('students')->where('Course', 3)->count('RegStatus'),
                    'BSE' => DB::table('students')->where('Course', 4)->count('RegStatus'),
                    'BSHM' => DB::table('students')->where('Course', 5)->count('RegStatus'),
                ];
            @endphp

            @foreach ($course as $name => $count)
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                    <h6 class="text-xl font-bold text-white mb-4">{{ $name }} Students</h6>
                    <p class="text-4xl font-semibold text-white">{{ $count }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
