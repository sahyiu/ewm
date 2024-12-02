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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // Primary Key: ID
            $table->foreignId('CourseID')->constrained('courses')->onDelete('cascade');
            $table->foreignId('InstructorID')->constrained('instructors')->onDelete('cascade');
            $table->enum('Day' ,['Mon','Tue','Wed','Thu','Fri','Sat']);
            $table->time('Time');
            $table->time('Time_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
