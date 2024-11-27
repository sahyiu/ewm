<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // If the table name is not plural or the convention is not followed, specify the table name
    protected $table = 'enrollment';  // Adjust the table name if necessary

    // Specify the fields that are mass assignable (for security purposes)
    protected $fillable = [
        'StudentID', 
        'LastName', 
        'FirstName', 
        'Course', 
        'YearLevel', 
        'Semester', 
        'EnrollmentDate', 
        'Input_by', 
        'created_at', 
        'updated_at'
    ];

    // Optionally, if you don't want to use timestamps, you can disable them:
    // public $timestamps = false;
}

