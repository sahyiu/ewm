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
        Schema::create('enrollment', function (Blueprint $table) {
            $table->id(); // Primary Key: ID
            $table->foreignId('StudentID')->constrained('students')->onDelete('cascade');
<<<<<<< HEAD
            $table->string('LastName');
            $table->string('FirstName');
            $table->string('Course');
            $table->enum('YearLevel', ['1','2','3','4'])->nullable()->default(null); // NULL as default
=======
>>>>>>> 5f2fce7a211c281c5f696bf1091fc14ce294fca0
            $table->enum('Semester', ['1','2']);
            $table->string('EnrollmentDate', 50);
            $table->string('Input_by',255); // Only by OFFICER users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};
