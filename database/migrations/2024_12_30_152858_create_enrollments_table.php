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
       // 5. Enrollments table with additional fields
Schema::create('enrollments', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id');  // Foreign key for student
    $table->unsignedBigInteger('class_id');    // Foreign key for class
    $table->enum('status', ['enrolled', 'dropped', 'completed'])->default('enrolled');  // Enrollment status
    $table->date('enrollment_date');  // Date of enrollment
    $table->text('notes')->nullable();  // Additional notes for the enrollment
    $table->timestamps();

    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
