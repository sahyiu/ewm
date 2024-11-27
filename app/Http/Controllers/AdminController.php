<?php
namespace App\Http\Controllers;

use App\Models\StudentNumberRange;
use App\Models\Student;  
use App\Models\StudentSchedule;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showReleaseStudentNo()
        {
            $enrollees = Enrollment::all(); // Or apply filters as needed

            return view('admin.releaseStudentNo', compact('enrollees'));
        }

    public function dashboard() {
        return view('admin.dashboard');
    }

    // Process the form and release student numbers
    public function releaseStudentNo(Request $request)
    {
        // Validate input
        $request->validate([
            'start_student_no' => 'required|integer|min:10000',
            'end_student_no' => 'required|integer|min:10000|gte:start_student_no',
        ]);

        $currentYear = date('Y');
        $startNumber = $request->start_student_no;
        $endNumber = $request->end_student_no;

        $studentsWithoutId = Enrollment::whereNull('StudentID')->get();

        if ($studentsWithoutId->isEmpty()) {
            return back()->with('success', 'No students found without a StudentID.');
        }

        $studentIndex = 0;

        foreach (range($startNumber, $endNumber) as $number) {
            if ($studentIndex < $studentsWithoutId->count()) {
                $student = $studentsWithoutId[$studentIndex];
                $student->StudentID = $currentYear . str_pad($number, 5, '0', STR_PAD_LEFT);
                $student->save();

                $studentIndex++;
            } else {
                break;
            }
        }

        return back()->with('success', 'Student numbers released successfully!');
    }



   //SCHEDULE
    
    public function showSchedulePage()
    {
        $schedules = StudentSchedule::all(); // Get all data from the student_schedule table

        if ($request->has('search')) {
            $schedules = StudentSchedule::where('LastName', 'like', '%' . $request->search . '%')
                ->orWhere('FirstName', 'like', '%' . $request->search . '%')
                ->orWhere('StudentID', 'like', '%' . $request->search . '%')
                ->get();
        }

        return view('admin.schedule', compact('schedules'));
    }
    public function scheduleStudent(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',  // Validate student exists
            'schedule_id' => 'required|exists:schedules,id', // Validate schedule exists
            'date' => 'required|date',  // Validate date format
        ]);

        // Schedule the student (saving in a new table, or you can modify according to your app)
        // Assuming you are saving this in the schedules table directly
        $schedule = new Schedule([
            'student_id' => $validated['student_id'],
            'schedule_id' => $validated['schedule_id'],
            'date' => $validated['date'],
        ]);

        $schedule->save(); // Save the scheduling data

        return redirect()->route('admin.schedule')->with('success', 'Student scheduled successfully!');
    }



    //BILLINGS
    public function billings() {
        return view('admin.billings');
    }
}

