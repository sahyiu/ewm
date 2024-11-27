<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_schedule', function (Blueprint $table) {
            $table->foreignId('StudentID')->constrained('students')->onDelete('cascade');
            $table->foreignId('ScheduleID')->constrained('schedules')->onDelete('cascade');
            $table->string('LastName');
            $table->string('FirstName');
            $table->enum('Course',['BSCS']);
            $table->enum('YearLevel', ['1','2','3','4'])->nullable()->default(null); // NULL as default
            $table->enum('Section', ['1','2','3','4','5']);
            $table->enum('Status',['Enrolled','Dropped']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_schedule');
    }
};
