<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Method to display the enrollment table
    public function showReleaseStudentNo()
    {
        // Fetch all enrollments from the database
        $enrollees = Enrollment::all();  // You can adjust this query as needed, e.g., using `paginate()` or filtering data.
        

    // Debug to confirm data
    dd($enrollees);

        // Pass the data to the Blade view
        return view('admin.releaseStudentNo', compact('enrollees'));
    }
}

