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
        Schema::create('billings', function (Blueprint $table) {
            $table->id(); // Primary Key: BillingID
            $table->foreignId('StudentID')->constrained('students')->onDelete('cascade');
            $table->foreignId('FeesID')->constrained('fees')->onDelete('cascade');
            $table->date('BillingDate');
            $table->enum('Status', ['Paid','Ong']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
