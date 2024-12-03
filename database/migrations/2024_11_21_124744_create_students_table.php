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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary Key: ID
            $table->string('StudentID',9);
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('MiddleName', 50);
            $table->enum('Sex',['M', 'F']);
            $table->date('DateOfBirth');
            $table->string('Address', 150);
            $table->string('Email', 50)->unique();
            $table->string('ContactNumber', 15)->nullable();
            $table->enum('Course',['CS','IT']);
            $table->enum('RegStatus',['New','Reg','Irr']);
            $table->enum('YearLevel', ['1','2','3','4'])->nullable()->default(null); // NULL as default
            $table->unsignedInteger('Section')->nullable(); // This is incremented based on the X number of student in a section
            $table->char('Active', 1); // Y or N
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
