<?php
namespace App\Http\Controllers;

use App\Models\StudentNumberRange;
use App\Models\Student;  
use App\Models\StudentSchedule;
use App\Models\Instructor;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade


class AdminController extends Controller
{

    public function viewdashboard()
    {
        // Fetch the count of enrolled students
        $enrolledStudents = DB::table('enrollment')->count();

        // Pass the count to the view
        return view('admin.dashboard', ['enrolledStudents' => $enrolledStudents]);
    }


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
        // Validate the input
        $request->validate([
            'start_student_no' => 'required|integer|min:10000',
            'end_student_no' => 'required|integer|min:10000|gte:start_student_no',
        ]);
    
        // Store the student number range along with the current year
        StudentNumberRange::create([
            'start_student_no' => $request->start_student_no,
            'end_student_no' => $request->end_student_no,
            'year' => now()->year, // Add the current year
        ]);
    
        return back()->with('success', 'Student number range has been saved!');
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



    //INSTRUCTORS
    public function showInstructors(Request $request)
    {
        $search = $request->input('search');
        $instructors = Instructor::query()
            ->when($search, function ($query, $search) {
                $query->where('FirstName', 'like', "%{$search}%")
                      ->orWhere('LastName', 'like', "%{$search}%")
                      ->orWhere('id', 'like', "%{$search}%");
            })
            ->get();

        return view('admin.instructor', compact('instructors'));
    }

    public function createInstructor()
    {
        return view('admin.instructor.new');  // Ensure the view exists
    }

    // Store a new instructor
    public function storeInstructor(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|unique:instructors',
            'ContactNumber' => 'required|digits:11',
        ]);

        Instructor::create($request->only(['FirstName', 'LastName', 'Email', 'ContactNumber']));
        return redirect()->route('admin.instructor')->with('success', 'Instructor added successfully.');
    }

    // Show edit form
    public function editInstructor($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructor.edit', compact('instructor'));
    }

    // Update instructor
    public function updateInstructor(Request $request, $id)
    {
        $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|unique:instructors,Email,' . $id,
            'ContactNumber' => 'required|digits:11',
        ]);

        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->only(['FirstName', 'LastName', 'Email', 'ContactNumber']));
        return redirect()->route('admin.instructor')->with('success', 'Instructor updated successfully.');
    }




    //BILLINGS
    public function billings() {
        return view('admin.billings');
    }
}

