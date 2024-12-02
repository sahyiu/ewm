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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Primary Key: ID
            $table->string('CourseCode', 255);
            $table->string('CourseName', 255);
            $table->integer('Lec_unit'); // Corrected from $table->int()
            $table->integer('Lab_unit'); // Corrected from $table->int()
            $table->integer('Lec_hour'); // Corrected from $table->int()
            $table->integer('Lab_hour'); // Corrected from $table->int()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
