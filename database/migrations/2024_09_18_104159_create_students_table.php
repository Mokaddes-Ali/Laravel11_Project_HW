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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('date_of_birth');
        $table->enum('gender', ['male', 'female', 'other']);
        $table->string('address');
        $table->string('religion')->nullable();
        $table->string('nationality')->nullable();
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->string('parents_name')->nullable();
        $table->string('parents_phone')->nullable();
        $table->string('course');
        $table->string('admission_date');
        $table->string('admission_fee')->nullable();
        $table->text('aditional_note')->nullable();
        $table->string('profile_image')->nullable();
        $table->timestamps();
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
