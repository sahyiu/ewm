<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('student_number_ranges', function (Blueprint $table) {
        $table->id();
        $table->integer('start_student_no');
        $table->integer('end_student_no');
        $table->year('year'); // To track which year the range belongs to
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_number_ranges');
    }
};
