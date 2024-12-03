<?php
<<<<<<< HEAD
=======

>>>>>>> 5f2fce7a211c281c5f696bf1091fc14ce294fca0
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> 5f2fce7a211c281c5f696bf1091fc14ce294fca0

class Student extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['student_number', 'name'];

    // Generate student number for new student
    public static function generateStudentNumber()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Get the latest student number based on the current year
        $latestStudent = self::where('student_number', 'like', $currentYear . '%')
                             ->orderBy('student_number', 'desc')
                             ->first();

        // If there's no student with the current year, start from 1
        $lastNumber = $latestStudent ? (int) substr($latestStudent->student_number, 4) : 0;

        // Increment the number and ensure it's 5 digits
        $newStudentNumber = $currentYear . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return $newStudentNumber;
    }
}

=======
    protected $table = 'students'; 
    protected $primaryKey = 'id'; 
    public $incrementing = true; 
    protected $fillable = [
        'StudentID', 'FirstName','MiddleName', 'LastName', 'Sex', 'DateOfBirth', 
        'Address', 'Email', 'ContactNumber', 'RegStatus', 'Course', 
        'YearLevel', 'Section', 'Active', 'EnrollmentDate', 'Input_by',
    ];
}
>>>>>>> 5f2fce7a211c281c5f696bf1091fc14ce294fca0
