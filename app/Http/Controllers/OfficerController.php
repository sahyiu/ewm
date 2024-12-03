<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OfficerController extends Controller
{
    public function dashboard()
    {
        // Count ALL STUDENTS
        $totalStudents = DB::table('students')->count();
        
        // Count ALL STUDENTS BASED ON COURSE/PROGRAM
        $totalIT = DB::table('students')->where('Course', 'IT')->count();
        $totalCS = DB::table('students')->where('Course', 'CS')->count();
    
        // Count students based on RegStatus
        $newStudents = DB::table('students')->where('RegStatus', 'New')->count();
        $regStudents = DB::table('students')->where('RegStatus', 'Reg')->count();
        $irrStudents = DB::table('students')->where('RegStatus', 'Irr')->count();
    
        return view('officer.dashboard', compact('totalStudents', 'totalIT', 'totalCS', 'newStudents', 'regStudents', 'irrStudents'));
    }
    

    public function create()
    {
        return view('officer.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'StudentID' => 'required|unique:students,StudentID|max:50',
            'FirstName' => 'required|max:50',
            'LastName' => 'required|max:50',
            'Sex' => 'required|in:M,F',
            'DateOfBirth' => 'required|date',
            'Address' => 'required|max:150',
            'Email' => 'required|email|max:50|unique:students,Email',
            'ContactNumber' => 'nullable|max:15',
            'RegStatus' => 'required|in:New,Reg,Irr',
            'Course' => 'required|in:CS,IT',
            'YearLevel' => 'nullable|in:1,2,3,4',
            'Section' => 'nullable|integer',
            'Active' => 'required|in:Y,N',
        ]);

        // Save the student data
        $student = new Student();
        $student->StudentID = $validated['StudentID'];
        $student->FirstName = $validated['FirstName'];
        $student->LastName = $validated['LastName'];
        $student->Sex = $validated['Sex'];
        $student->DateOfBirth = $validated['DateOfBirth'];
        $student->Address = $validated['Address'];
        $student->Email = $validated['Email'];
        $student->ContactNumber = $validated['ContactNumber'] ?? null;
        $student->RegStatus = $validated['RegStatus'];
        $student->Course = $validated['Course'];
        $student->YearLevel = $validated['YearLevel'] ?? null;
        $student->Section = $validated['Section'] ?? null;
        $student->Active = $validated['Active'];
        $student->EnrollmentDate = now();
        $student->Input_by = auth()->user()->name;
        $student->save();

        return redirect()->route('officer.create')->with('success', 'Student record created successfully!');
    }


    public function manage(Request $request)
    {
        // Filter students based on request parameters
        $query = Student::query();
        if ($studentNo = $request->input('student-no')) {
            $query->where('StudentID', 'like', "%{$studentNo}%");
        }
        if ($lastname = $request->input('lastname')) {
            $query->where('LastName', 'like', "%{$lastname}%");
        }
        if ($course = $request->input('course')) {
            $query->where('Course', 'like', "%{$course}%");
        }
        $students = $query->paginate(2);
        return view('officer.manage', compact('students'));
    }

    public function edit($id)
    {
        // Get the student record
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);
    
            // Validate the incoming data
            $request->validate([
                'FirstName' => 'required|string',
                'LastName' => 'required|string',
                'Sex' => 'required|in:M,F',
                'DateOfBirth' => 'required|date',
                'Address' => 'required|string|max:150',
                'Email' => 'required|email|max:50',
                'ContactNumber' => 'nullable|string|max:15',
                'Course' => 'required|in:CS,IT',
                'RegStatus' => 'required|in:New,Reg,Irr',
                'YearLevel' => 'nullable|in:1,2,3,4',
                'Section' => 'nullable|integer',
                'Active' => 'required|string|size:1',

            ]);
    
            // Update the student's record
            $student->FirstName = $request->input('FirstName');
            $student->LastName = $request->input('LastName');
            $student->Sex = $request->input('Sex');
            $student->DateOfBirth = $request->input('DateOfBirth');
            $student->Address = $request->input('Address');
            $student->Email = $request->input('Email');
            $student->ContactNumber = $request->input('ContactNumber');
            $student->Course = $request->input('Course');
            $student->RegStatus = $request->input('RegStatus');
            $student->YearLevel = $request->input('YearLevel');
            $student->Section = $request->input('Section');
            $student->Active = $request->input('Active');
    
    
            // Save the changes to the database
            $student->save();
    
            // Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Student record updated successfully!'
            ]);
        } catch (\Exception $e) {
            // Handle errors (e.g., database errors, validation failures)
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the student record.'
            ], 500);
        }
    }
    

    

}

