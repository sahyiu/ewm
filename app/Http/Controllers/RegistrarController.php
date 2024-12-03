<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    public function dashboard() {
        return view('registrar.dashboard');
    }

    // In RegistrarController.php
    public function generateCor(Request $request)
    {
        // Get the search query (if any)
        $search = $request->input('search');
        $sort = $request->input('sort', 'StudentID'); // Default sort by StudentID

        // Query students with optional search and sorting
        $students = DB::table('students');

        // Apply search filter
        if ($search) {
            $students = $students->where(function ($query) use ($search) {
                $query->where('StudentID', 'like', '%' . $search . '%')
                      ->orWhere('FirstName', 'like', '%' . $search . '%')
                      ->orWhere('LastName', 'like', '%' . $search . '%')
                      ->orWhere('Course', 'like', '%' . $search . '%');
            });
        }

        // Apply sorting
        $students = $students->orderBy($sort)->paginate(10);

        // Return the view with students data
        return view('registrar.generate-cor', compact('students'));
    }
    public function createStudent()
    {
        return view('registrar.create-student');
    }

    public function storeStudent(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'StudentID' => 'required|unique:students|numeric',
            'FirstName' => 'required|string|max:255',
            'MiddleName' => 'nullable|string|max:255',
            'LastName' => 'required|string|max:255',
            'Sex' => 'required|in:M,F', 
            'DateOfBirth' => 'required|date',
            'Address' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'ContactNumber' => 'nullable|numeric', 
            'Course' => 'required|string|max:255',
            'RegStatus' => 'required|string|max:255',
            'YearLevel' => 'required|string|max:255',
            'Section' => 'required|string|max:255',
            'Active' => 'required|in:Y,N', 
        ]);

        Student::create([
            'StudentID' => $validated['StudentID'],
            'FirstName' => $validated['FirstName'],
            'MiddleName' => $validated['MiddleName'] ?? null,
            'LastName' => $validated['LastName'],
            'Sex' => $validated['Sex'],
            'DateOfBirth' => $validated['DateOfBirth'],
            'Address' => $validated['Address'],
            'Email' => $validated['Email'],
            'ContactNumber' => $validated['ContactNumber'] ?? null,
            'Course' => $validated['Course'],
            'RegStatus' => $validated['RegStatus'],
            'YearLevel' => $validated['YearLevel'],
            'Section' => $validated['Section'],
            'Active' => $validated['Active'],
        ]);

        // Redirect back with a success message
        return redirect()->route('registrar.create-student')->with('success', 'Student record created successfully!');
    }

}
