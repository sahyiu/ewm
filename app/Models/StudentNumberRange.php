<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNumberRange extends Model
{
    use HasFactory;

    // Define the table name if it differs from the plural form
    protected $table = 'student_number_ranges';

    // Define which columns can be mass assigned
    protected $fillable = ['start_student_no', 'end_student_no', 'year'];
}
