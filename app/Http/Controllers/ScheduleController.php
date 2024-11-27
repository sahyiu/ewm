<?php
namespace App\Http\Controllers;

use App\Models\StudentSchedule; // Assuming you have a Schedule model
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showSchedule(Request $request)
    {
        // Fetch the schedules from the database
        $schedules = StudentSchedule::all();

        // If there's a search term, filter the schedules based on the search input
        if ($request->has('search')) {
            $schedules = Schedule::where('subject', 'like', '%' . $request->search . '%')
                ->orWhere('instructor', 'like', '%' . $request->search . '%')
                ->orWhere('time', 'like', '%' . $request->search . '%')
                ->get();
        }

        // Return the schedule view with the schedules data
        return view('admin.schedule', compact('schedules'));
    }

    public function storeSchedule(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'CourseID' => 'required|string|exists:courses,id',  // Ensure CourseID exists in courses table
            'InstructorID' => 'required|string|exists:instructors,id',  // Ensure InstructorID exists
            'Day' => 'required|string',
            'Time' => 'required|date_format:H:i:s',
            'Time_end' => 'required|date_format:H:i:s|after:Time',
        ]);

        // Create and save the schedule
        $schedule = new Schedule();
        $schedule->CourseID = $validated['CourseID'];
        $schedule->InstructorID = $validated['InstructorID'];
        $schedule->Day = $validated['Day'];
        $schedule->Time = $validated['Time'];
        $schedule->Time_end = $validated['Time_end'];
        $schedule->created_at = now();
        $schedule->updated_at = now();
        $schedule->save();

        // Redirect back with a success message
        return redirect()->route('admin.schedule')->with('success', 'Schedule added successfully!');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        // Eager load the student relationship to avoid the null reference error
        $schedules = Schedule::with('student')
                        ->whereHas('student', function($query) use ($search) {
                            $query->where('StudentID', 'like', "%$search%")
                                  ->orWhere('LastName', 'like', "%$search%")
                                  ->orWhere('FirstName', 'like', "%$search%");
                        })
                        ->get();
    
        return view('admin.schedule', compact('schedules'));
    }

    // In ScheduleController

public function edit($id)
{
    // Find the schedule by ID
    $schedule = Schedule::findOrFail($id);
    
    // Pass the schedule to the view
    return view('admin.schedule.edit', compact('schedule'));
}

public function update(Request $request, $id)
{
    // Validate and update the schedule
    $request->validate([
        'CourseID' => 'required',
        'InstructorID' => 'required',
        'Day' => 'required',
        'Time' => 'required',
        'Time_end' => 'required',
    ]);

    $schedule = Schedule::findOrFail($id);
    $schedule->update($request->all());

    return redirect()->route('admin.schedule')->with('success', 'Schedule updated successfully!');
}

}
