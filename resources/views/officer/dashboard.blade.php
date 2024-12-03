<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8">
    <div class="flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-4xl w-full">
            <!-- Total Students -->
            <div class="bg-blue-200 p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-blue-800 mb-4">
                    <span>Students</span>
                </div>
                <div class="text-4xl font-semibold text-blue-600 mb-4">
                    {{ $totalStudents }}
                </div>
            </div>

            <!-- IT Students -->
            <div class="bg-green-200 p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-green-800 mb-4">
                    <span>Information Technology</span>
                </div>
                <div class="text-4xl font-semibold text-green-600 mb-4">
                    {{ $totalIT }}
                </div>
            </div>

            <!-- CS Students -->
            <div class="bg-maroon-light p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-maroon mb-4">
                    <span>Computer Science</span>
                </div>
                <div class="text-4xl font-semibold text-maroon mb-4">
                    {{ $totalCS }}
                </div>

            <!-- NEW Students -->    
            </div>
            <div class="bg-orange-200 p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-orange-800 mb-4">
                    <span>New Students</span>
                </div>
                <div class="text-4xl font-semibold text-orange-600 mb-4">
                {{ $newStudents }}
                </div>
            </div>

            <!-- REGULAR Students -->
            <div class="bg-orange-200 p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-orange-800 mb-4">
                    <span>Regular Students</span>
                </div>
                <div class="text-4xl font-semibold text-orange-600 mb-4">
                {{ $regStudents }}
                </div>
            </div>

            <!-- IRREGULAR Students -->
            <div class="bg-orange-200 p-6 rounded-lg shadow-lg text-center">
                <div class="text-2xl font-bold text-orange-800 mb-4">
                    <span>Irregular Students</span>
                </div>
                <div class="text-4xl font-semibold text-orange-600 mb-4">
                {{ $irrStudents }}
                </div>
            </div>

        </div>
    </div>
</div>


</x-app-layout>
