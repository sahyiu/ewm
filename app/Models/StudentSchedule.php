<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{   
    use HasFactory;

    protected $table = 'student_schedule'; // Specify the table name
    protected $fillable = [
        'StudentID',
        'ScheduleID',
        'LastName',
        'FirstName',
        'Course',
        'YearLevel',
        'Section',
        'Status',
    ];
    
    // Define any relationships if needed
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID', 'id');
    }
}