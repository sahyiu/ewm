<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Access Denied') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Error Title -->
                    <div class="text-4xl font-bold text-red-600 dark:text-red-400 mb-4">
                        403 Forbidden
                    </div>
                    <!-- Error Message -->
                    <p class="text-lg mb-4">
                        You are trying to access a page that you don't have permission to view.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
