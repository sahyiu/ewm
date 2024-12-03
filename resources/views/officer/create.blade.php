<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Record') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('officer.store') }}" method="POST" class="space-y-6 ">
            @csrf
            <!-- Form Inputs Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Student Number -->
                <div class="form-element">
                    <label for="student-no" class="block text-sm font-medium mb-2">Student No.</label>
                    <input type="text" id="student-no" name="StudentID" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Student No." value="{{ old('StudentID') }}" required>
                    @error('StudentID')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- First Name -->
                <div class="form-element">
                    <label for="firstname" class="block text-sm font-medium mb-2">Firstname</label>
                    <input type="text" id="firstname" name="FirstName" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Enter Firstname" value="{{ old('FirstName') }}" required>
                    @error('FirstName')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-element">
                    <label for="lastname" class="block text-sm font-medium mb-2">Lastname</label>
                    <input type="text" id="lastname" name="LastName" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Enter Lastname" value="{{ old('LastName') }}" required>
                    @error('LastName')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-element">
                    <label for="gender" class="block text-sm font-medium mb-2">Sex</label>
                    <select id="gender" name="Sex" 
                            class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="M" {{ old('Sex') == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ old('Sex') == 'F' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('Sex')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-element">
                    <label for="dob" class="block text-sm font-medium mb-2">Date of Birth</label>
                    <input type="date" id="dob" name="DateOfBirth" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           value="{{ old('DateOfBirth') }}" required>
                    @error('DateOfBirth')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-element">
                    <label for="address" class="block text-sm font-medium mb-2">Address</label>
                    <input type="text" id="address" name="Address" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Complete Address" value="{{ old('Address') }}" required>
                    @error('Address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-element">
                    <label for="email" class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="Email" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Email" value="{{ old('Email') }}" required>
                    @error('Email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-element">
                    <label for="phone" class="block text-sm font-medium mb-2">Contact Number</label>
                    <input type="tel" id="phone" name="ContactNumber" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Phone Number" value="{{ old('ContactNumber') }}">
                    @error('ContactNumber')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course -->
                <div class="form-element">
                    <label for="course" class="block text-sm font-medium mb-2">Course</label>
                    <select id="course" name="Course" 
                            class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="CS" {{ old('Course') == 'CS' ? 'selected' : '' }}>Computer Science</option>
                        <option value="IT" {{ old('Course') == 'IT' ? 'selected' : '' }}>Information Technology</option>
                    </select>
                    @error('Course')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-element">
                    <label for="status" class="block text-sm font-medium mb-2">Status</label>
                    <select id="status" name="RegStatus" 
                            class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="New" {{ old('RegStatus') == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Reg" {{ old('RegStatus') == 'Reg' ? 'selected' : '' }}>Reg</option>
                        <option value="Irreg" {{ old('RegStatus') == 'Irr' ? 'selected' : '' }}>Irreg</option>
                    </select>
                    @error('RegStatus')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Year Level -->
                <div class="form-element">
                    <label for="year-level" class="block text-sm font-medium mb-2">Year Level</label>
                    <select id="year-level" name="YearLevel" 
                            class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="1" {{ old('YearLevel') == '1' ? 'selected' : '' }}>1st year</option>
                        <option value="2" {{ old('YearLevel') == '2' ? 'selected' : '' }}>2nd year</option>
                        <option value="3" {{ old('YearLevel') == '3' ? 'selected' : '' }}>3rd year</option>
                        <option value="4" {{ old('YearLevel') == '4' ? 'selected' : '' }}>4th year</option>
                    </select>
                    @error('YearLevel')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Section -->
                <div class="form-element">
                    <label for="section" class="block text-sm font-medium mb-2">Section</label>
                    <input type="text" id="section" name="Section" 
                           class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                           placeholder="Enter Section" value="{{ old('Section') }}">
                    @error('Section')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Active -->
                <div class="form-element">
                    <label for="active" class="block text-sm font-medium mb-2">Active</label>
                    <select id="active" name="Active" 
                            class="w-full p-3 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="Y" {{ old('Active') == 'Y' ? 'selected' : '' }}>Yes</option>
                        <option value="N" {{ old('Active') == 'N' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('Active')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="bg-blue-500 text-white  py-3 px-8 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
