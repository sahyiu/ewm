<?php

namespace App\Http\Controllers;

use App\Models\StudentSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showSchedule(Request $request)
    {
        // Fetch the schedules from the database
        $schedules = StudentSchedule::all();

        // If there's a search term, filter the schedules based on the search input
        if ($request->has('search')) {
            $schedules = StudentSchedule::where('CourseID', 'like', '%' . $request->search . '%')
                ->orWhere('InstructorID', 'like', '%' . $request->search . '%')
                ->orWhere('StudentID', 'like', "%$search%")
                ->orWhere('time', 'like', '%' . $request->search . '%')
                ->get();
        }

        // Return the schedule view with the schedules data
        return view('admin.schedule', compact('schedules'));
    }

    

    public function index(Request $request)
    {
        $search = $request->input('search');
        // Eager load the student relationship to avoid the null reference error
        $schedules = StudentSchedule::with('student')
                        ->whereHas('student', function($query) use ($search) {
                            $query->where('StudentID', 'like', "%$search%")
                                  ->orWhere('LastName', 'like', "%$search%")
                                  ->orWhere('FirstName', 'like', "%$search%");
                        })
                        ->get();
    
        return view('admin.schedule', compact('schedules'));
    }


    public function new()
    {
        return view('admin.schedule.new');
    }
    public function storeSchedule(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'CourseID' => 'required|string|exists:courses,id',  // Ensure CourseID exists in courses table
            'InstructorID' => 'required|string|exists:instructors,id',  // Ensure InstructorID exists
            'StudentID' => 'required|string|exists:students,id', // Ensure StudentID exists in the students table
            'Day' => 'required|string|in:Mon,Tue,Wed,Thu,Fri,Sat', // Restrict valid values for days
            'Time' => 'required|date_format:H:i:s',
            'Time_end' => 'required|date_format:H:i:s|after:Time',
            'YearLevel' => 'required|integer|between:1,4', // Restrict valid YearLevel to 1-4
            'Section' => 'required|string|max:10', // Validate Section with a max length
        ]);

        // Create and save the schedule
        $schedule = new StudentSchedule();  // Use the correct model here
        $schedule->CourseID = $validated['CourseID'];
        $schedule->InstructorID = $validated['InstructorID'];
        $schedule->StudentID = $validated['StudentID'];
        $schedule->Day = $validated['Day'];
        $schedule->Time = $validated['Time'];
        $schedule->Time_end = $validated['Time_end'];
        $schedule->YearLevel = $validated['YearLevel'];
        $schedule->Section = $validated['Section'];
        $schedule->created_at = now();
        $schedule->updated_at = now();
        $schedule->save();

        // Redirect back with a success message
        return redirect()->route('admin.schedule.new')->with('success', 'Schedule added successfully!');
    }
    
    public function edit($id)
    {
        // Find the schedule by ID
        $schedule = StudentSchedule::findOrFail($id);  // Use the correct model here
    
        // Pass the schedule to the view
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the schedule
        $request->validate([
            'CourseID' => 'required',
            'InstructorID' => 'required',
            'StudentID' => 'required',
            'Day' => 'required',
            'Time' => 'required',
            'Time_end' => 'required',
            'YearLevel' => 'required',
            'Section' => 'required',

        ]);

        $schedule = StudentSchedule::findOrFail($id);  // Use the correct model here
        $schedule->update($request->all());

        return redirect()->route('admin.schedule')->with('success', 'Schedule updated successfully!');
    }
}
