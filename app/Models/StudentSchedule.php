<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{   
    use HasFactory;

    protected $table = 'schedules'; // Specify the table name

    // Define the primary key
    protected $primaryKey = 'id';  // Assuming 'ID' is the name of the primary key column

    protected $fillable = [
        'ID',
        'CourseID',           // Foreign Key for Course
        'InstructorID',       // Foreign Key for Instructor
        'StudentID',            // Section number
        'Day',                // Day of the week (e.g., Monday, Tuesday, etc.)
        'Time',               // Time of the schedule
        'Time_end',
        'YearLevel',
        'Section',         // To track soft deletion status
    ];

    // Define any relationships if needed
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseID', 'ID');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'InstructorID', 'ID');
    }

    // Optional: You can add other relationships based on your application's needs.
}
