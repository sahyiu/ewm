<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Old Records') }}
        </h2>
    </x-slot>

    <!-- FILTER -->
    <main class="flex-1 p-6 h-full w-full">
        <section class="border border-gray-500 p-2 text-black">
            <h2 class="text-2xl">FILTER BY:</h2>
            <form method="GET" class="flex gap-2 items-center mt-4">
                <label for="student-no">Student No:</label>
                <input type="text" name="student-no" id="student-no" placeholder="Student No" class="p-2 rounded-lg">
                <label for="lastname">Student Lastname:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="p-2 rounded-lg">
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" placeholder="Course" class="p-2 rounded-lg">
                <button type="submit" class="submit px-6 py-2 bg-blue-600 text-white rounded-lg">Submit</button>
            </form>
        </section>

        <!-- Status Message -->
        <div id="statusMessage" class="hidden p-2 mt-4 text-sm rounded border"></div>

        <div class="overflow-y-auto max-h-[400px] w-[970px] border border-gray-300 rounded-lg mt-4">
    <table class="w-full table-auto  ">
        <thead>
            <tr class="bg-gray-600 text-white text-sm">
                <th class="p-2">Student No.</th>
                <th class="p-2">Firstname</th>
                <th class="p-2">Lastname</th>
                <th class="p-2">Sex</th>
                <th class="p-2">Date of Birth</th>
                <th class="p-2">Address</th>
                <th class="p-2">Email</th>
                <th class="p-2">Contact No.</th>
                <th class="p-2">Course</th>
                <th class="p-2">Status</th>
                <th class="p-2">Year Level</th>
                <th class="p-2">Section</th>
                <th class="p-2">Active</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr class="bg-gray-200 text-black text-sm" data-id="{{ $student->id }}">
                    <td class="p-2">{{ $student->StudentID }}</td>
                    <td class="p-2">{{ $student->FirstName }}</td>
                    <td class="p-2">{{ $student->LastName }}</td>
                    <td class="p-2">{{ $student->Sex }}</td>
                    <td class="p-2">{{ $student->DateOfBirth }}</td>
                    <td class="p-2">{{ $student->Address }}</td>
                    <td class="p-2">{{ $student->Email }}</td>
                    <td class="p-2">{{ $student->ContactNumber }}</td>
                    <td class="p-2">{{ $student->Course }}</td>
                    <td class="p-2">{{ $student->RegStatus }}</td>
                    <td class="p-2">{{ $student->YearLevel }}</td>
                    <td class="p-2">{{ $student->Section }}</td>
                    <td class="p-2">{{ $student->Active }}</td>
                    <td class="p-2">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600" onclick="openModal({{ $student->id }})">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $students->links() }}  <!-- Pagination controls (Previous, Next) -->
    </div>
</div>


        <!-- Edit Modal -->
        <div id="editModal" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-1/2">
                <h2 class="text-xl font-semibold mb-4 ">Edit Student</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="student_id" id="student_id">
                    <div class="grid grid-cols-4 gap-4">
                    <div class="mb-4">
                        <label for="FirstName" class="block">First Name</label>
                        <input type="text" name="FirstName" id="FirstName" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="LastName" class="block">Last Name</label>
                        <input type="text" name="LastName" id="LastName" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="Sex" class="block">Sex (M or F)</label>
                        <input type="text" name="Sex" id="Sex" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="DateOfBirth" class="block">Date of Birth</label>
                        <input type="date" name="DateOfBirth" id="DateOfBirth" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4 col-span-2">
                        <label for="Address" class="block">Address</label>
                        <input type="type" name="Address" id="Address" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4 col-span-2">
                        <label for="Email" class="block">Email</label>
                        <input type="type" name="Email" id="Email" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="ContactNumber" class="block">Contact Number</label>
                        <input type="tel" name="ContactNumber" id="ContactNumber" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>


                    <div class="mb-4">
                        <label for="Course" class="block">Course (CS or IT)</label>
                        <input type="text" name="Course" id="Course" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    

                    <div class="mb-4">
                        <label for="Section" class="block">Section</label>
                        <input type="text" name="Section" id="Section" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="Active" class="block">Active(Y or N)</label>
                        <input type="text" name="Active" id="Active" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4 col-span-2">
                        <label for="RegStatus" class="block">Status (New/Reg/Irr)</label>
                        <input type="text" name="RegStatus" id="RegStatus" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4 col-span-2">
                        <label for="YearLevel" class="block">Year Level (1/2/3/4)</label>
                        <input type="text" name="YearLevel" id="YearLevel" class="p-2 w-full border border-gray-300 rounded" required>
                    </div>

                    </div>

                    <div class="flex justify-center gap-2">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                        <button type="button" id="saveChangesBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
                    </div>
                </form>
               
            </div>
        </div>

    </main>

    <script>
    const modal = document.getElementById('editModal');

    function openModal(studentId) {
        modal.classList.remove('hidden');
        fetch(`/officer/student/${studentId}/edit`)
            .then(response => response.json())
            .then(student => {
                document.getElementById('student_id').value = student.id;
                document.getElementById('FirstName').value = student.FirstName;
                document.getElementById('LastName').value = student.LastName;
                document.getElementById('Sex').value = student.Sex;
                document.getElementById('DateOfBirth').value = student.DateOfBirth;
                document.getElementById('Address').value = student.Address;
                document.getElementById('Email').value = student.Email;
                document.getElementById('ContactNumber').value = student.ContactNumber;
                document.getElementById('Course').value = student.Course;
                document.getElementById('RegStatus').value = student.RegStatus;
                document.getElementById('YearLevel').value = student.YearLevel;
                document.getElementById('Section').value = student.Section;
                document.getElementById('Active').value = student.Active;

            });
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    document.getElementById('saveChangesBtn').addEventListener('click', function (e) {
        e.preventDefault(); 

        const studentId = document.getElementById('student_id').value;
        const data = {
            student_id: studentId,
            FirstName: document.getElementById('FirstName').value,
            LastName: document.getElementById('LastName').value,
            Sex: document.getElementById('Sex').value,
            DateOfBirth: document.getElementById('DateOfBirth').value,
            Address: document.getElementById('Address').value,
            Email: document.getElementById('Email').value,
            ContactNumber: document.getElementById('ContactNumber').value,
            Course: document.getElementById('Course').value,
            RegStatus: document.getElementById('RegStatus').value,
            YearLevel: document.getElementById('YearLevel').value,
            Section: document.getElementById('Section').value,
            Active: document.getElementById('Active').value,

            _token: '{{ csrf_token() }}',
        };

        fetch(`/officer/student/${studentId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(response => {
            if (response.success) {
                // Display success message
                showStatusMessage('success', 'Student record updated successfully!');

                // Close the modal
                closeModal();
                
                // Update table row with new data
                updateTableRow(studentId, data);
            } else {
                // Display failure message
                showStatusMessage('error', 'An error occurred while updating the student record.');
            }
        })
        .catch(error => {
            // Display error message in case of network issues
            showStatusMessage('error', 'An error occurred while updating the student record.');
        });
    });

    function showStatusMessage(type, message) {
        const statusMessage = document.getElementById('statusMessage');
        statusMessage.classList.remove('hidden', 'bg-green-100', 'bg-red-100', 'text-green-800', 'text-red-800', 'border-green-300', 'border-red-300');
        
        if (type === 'success') {
            statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-green-300');
        } else {
            statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-red-300');
        }
        
        statusMessage.textContent = message;
        statusMessage.classList.remove('hidden');
        
        // Hide the status message after 3 seconds
        setTimeout(() => {
            statusMessage.classList.add('hidden');
        }, 3000); // 3000 milliseconds = 3 seconds
    }

    function updateTableRow(studentId, updatedData) {
        const row = document.querySelector(`tr[data-id="${studentId}"]`);
        row.querySelector('td:nth-child(2)').textContent = updatedData.FirstName;
        row.querySelector('td:nth-child(3)').textContent = updatedData.LastName;
        row.querySelector('td:nth-child(4)').textContent = updatedData.Sex;
        row.querySelector('td:nth-child(5)').textContent = updatedData.DateOfBirth;
        row.querySelector('td:nth-child(6)').textContent = updatedData.Address;
        row.querySelector('td:nth-child(7)').textContent = updatedData.Email;
        row.querySelector('td:nth-child(8)').textContent = updatedData.ContactNumber;
        row.querySelector('td:nth-child(9)').textContent = updatedData.Course;
        row.querySelector('td:nth-child(10)').textContent = updatedData.RegStatus;
        row.querySelector('td:nth-child(11)').textContent = updatedData.YearLevel;
        row.querySelector('td:nth-child(12)').textContent = updatedData.Section;
        row.querySelector('td:nth-child(13)').textContent = updatedData.Active;

    }
</script>

</x-app-layout>
