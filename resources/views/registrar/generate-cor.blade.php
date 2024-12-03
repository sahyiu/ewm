<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Generate COR') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8 p-6">
        <!-- Search bar and sort controls -->
        <div class="flex justify-between items-center mb-8 p-4 bg-blue-50 rounded-lg shadow-md">
            <div class="w-1/2">
                <!-- Search Bar -->
                <form method="GET" action="{{ route('registrar.generate-cor') }}" class="flex">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full" 
                        placeholder="Search by Name, ID, or Course"
                    >
                    <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                        Search
                    </button>
                </form>
            </div>

            <!-- Sort by options -->
            <div>
                <form method="GET" action="{{ route('registrar.generate-cor') }}" class="flex">
                    <select 
                        name="sort" 
                        class="border border-gray-300 rounded-lg px-4 py-2"
                        onchange="this.form.submit()">
                        <option value="">Sort By</option>
                        <option value="StudentID" {{ request('sort') == 'StudentID' ? 'selected' : '' }}>Student ID</option>
                        <option value="FirstName" {{ request('sort') == 'FirstName' ? 'selected' : '' }}>Name</option>
                        <option value="Course" {{ request('sort') == 'Course' ? 'selected' : '' }}>Course</option>
                        <option value="YearLevel" {{ request('sort') == 'YearLevel' ? 'selected' : '' }}>Year Level</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Grid layout to display student table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-center table-auto">
                <thead class="bg-gray-700 text-gray">
                    <tr>
                        <th class="py-2 px-4">
                            <a href="{{ route('registrar.generate-cor', ['sort' => 'StudentID']) }}" class="hover:underline">Student ID</a>
                        </th>
                        <th class="py-2 px-4">
                            <a href="{{ route('registrar.generate-cor', ['sort' => 'FirstName']) }}" class="hover:underline">Name</a>
                        </th>
                        <th class="py-2 px-4">
                            <a href="{{ route('registrar.generate-cor', ['sort' => 'Course']) }}" class="hover:underline">Course & Section</a>
                        </th>
                        <th class="py-2 px-4">Birthdate</th>
                        <th class="py-2 px-4">Contact Number</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Registration Status</th>
                        <th class="py-2 px-4">Active</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $student->StudentID }}</td>
                            <td class="py-2 px-4">{{ $student->FirstName }} {{ $student->MiddleName }} {{ $student->LastName }}</td>
                            <td class="py-2 px-4">{{ $student->Course }} {{ $student->YearLevel }} - {{ $student->Section }}</td>
                            <td class="py-2 px-4">{{ $student->DateOfBirth }}</td>
                            <td class="py-2 px-4">{{ $student->ContactNumber }}</td>
                            <td class="py-2 px-4">{{ $student->Email }}</td>
                            <td class="py-2 px-4">{{ $student->RegStatus }}</td>
                            <td class="py-2 px-4">{{ $student->Active }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('registrar.dashboard', $student->StudentID) }}" class="text-blue-500 hover:text-blue-700 mr-4">
                                    Edit
                                </a>
                                <a href="{{ route('registrar.dashboard', $student->StudentID) }}" class="text-green-500 hover:text-green-700">
                                    Print
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="mt-4">
                {{ $students->appends(request()->query())->links() }} <!-- This ensures that search and sort filters persist during pagination -->
            </div>
        </div>
    </div>
</x-app-layout>
