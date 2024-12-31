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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of the class
            $table->unsignedBigInteger('teacher_id');  // Foreign key to teacher
            $table->enum('class_type', ['lecture', 'lab', 'tutorial'])->default('lecture');  // Type of class
            $table->string('location')->nullable();  // Class location (room number, etc.)
            $table->string('schedule')->nullable();  // Class schedule (e.g., Mon-Wed-Fri, 9-11 AM)
            $table->enum('status', ['active', 'inactive'])->default('active');  // Class status (active or inactive)
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');  // Foreign key relationship
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
