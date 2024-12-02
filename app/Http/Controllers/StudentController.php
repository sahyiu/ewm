<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentNumberRange;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentController extends Controller
{
    // Process the form and release student numbers
    public function releaseStudentNumbers(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'start_student_no' => 'required|numeric',
            'end_student_no' => 'required|numeric|gt:start_student_no',
        ]);

        // Get the current year
        $currentYear = Carbon::now()->year;

        // Get the start and end numbers from the form
        $startStudentNo = $request->input('start_student_no');
        $endStudentNo = $request->input('end_student_no');

        // Ensure that the start number is less than or equal to the end number
        if ($startStudentNo > $endStudentNo) {
            return redirect()->route('admin.releaseStudentNo')->with('error', 'Start student number must be less than or equal to end student number.');
        }

        // Store the released range in the student_number_ranges table
        StudentNumberRange::create([
            'start_student_no' => $startStudentNo,
            'end_student_no' => $endStudentNo,
            'year' => $currentYear
        ]);

        // Redirect back with success message
        return redirect()->route('admin.releaseStudentNo')->with('success', 'Student numbers released successfully!');
    }

    // Store a new student
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Generate a student number based on the current year
        $studentNumber = $this->generateStudentNumber();

        // Create the student record
        $student = Student::create([
            'student_number' => $studentNumber,
            'name' => $request->name,
        ]);

        return response()->json($student, 201); // or redirect to a view
    }

    // Generate the student number based on the year and incremental number
    private function generateStudentNumber()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Find the latest student number for this year
        $latestStudent = Student::where('student_number', 'like', $currentYear . '%')
                                ->orderBy('student_number', 'desc')
                                ->first();

        // If no student number exists, start from the first number
        $lastNumber = $latestStudent ? (int) substr($latestStudent->student_number, 4) : 0;

        // Increment the number and pad it to 5 digits
        $newStudentNumber = $currentYear . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return $newStudentNumber;

        $start = $range->start_student_no;
        $end = $range->end_student_no;
        
        // Generate student IDs in the format YYYY + number
        $studentNumbers = [];
        for ($i = $start; $i <= $end; $i++) {
            $studentNumbers[] = $currentYear . str_pad($i, 5, '0', STR_PAD_LEFT); // Pad number to 5 digits
        }
        

    }

    public function assignStudentNumber(Request $request)
    {
        // Get the available range of student numbers for the current year
        $currentYear = Carbon::now()->year;

        // Get the first available student number from the range for this year
        $range = StudentNumberRange::where('year', $currentYear)
            ->where('start_student_no', '<=', $endStudentNo)
            ->where('end_student_no', '>=', $startStudentNo)
            ->first();

        if ($range) {
            $start = $range->start_student_no;
            $end = $range->end_student_no;
            
            // Generate student IDs in the format YYYY + number
            $studentNumbers = [];
            for ($i = $start; $i <= $end; $i++) {
                $studentNumbers[] = $currentYear . $i;
            }

            return response()->json($studentNumbers); // Example: Returns the student numbers
        }
    }

}
