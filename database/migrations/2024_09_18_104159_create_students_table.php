<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//     public function up()
// {
//     Schema::create('students', function (Blueprint $table) {
//         $table->id();
//         $table->string('name');
//         $table->string('date_of_birth');
//         $table->enum('gender', ['male', 'female', 'other']);
//         $table->string('address');
//         $table->string('religion')->nullable();
//         $table->string('nationality')->nullable();
//         $table->string('email')->unique();
//         $table->string('phone')->nullable();
//         $table->string('parents_name')->nullable();
//         $table->string('parents_phone')->nullable();
//         $table->string('course');
//         $table->string('admission_date');
//         $table->string('admission_fee')->nullable();
//         $table->text('aditional_note')->nullable();
//         $table->string('profile_image')->nullable();
//         $table->timestamps();
//     });
// }


public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('photo')->nullable();
        $table->date('dob');
        $table->string('gender');
        $table->string('nationality');
        $table->string('religion');
        $table->string('blood_group')->nullable();
        $table->string('national_id')->nullable();
        $table->text('permanent_address');
        $table->text('current_address')->nullable();
        $table->string('phone');
        $table->string('email')->unique();
        $table->string('emergency_contact');
        $table->string('marital_status')->nullable();
        $table->string('passport_number')->nullable();
        $table->string('father_name')->nullable();
        $table->string('father_phone')->nullable();
        $table->string('father_education')->nullable();
        $table->string('father_occupation')->nullable();
        $table->string('mother_name')->nullable();
        $table->string('mother_phone')->nullable();
        $table->string('mother_education')->nullable();
        $table->string('mother_occupation')->nullable();
        $table->decimal('family_income', 15, 2)->nullable();
        $table->integer('total_family_members')->nullable();
        $table->string('guardian_name')->nullable();
        $table->string('guardian_relation')->nullable();
        $table->string('guardian_occupation')->nullable();
        $table->string('guardian_number')->nullable();
        $table->string('ssc_roll')->nullable();
        $table->string('ssc_reg')->nullable();
        $table->string('ssc_result')->nullable();
        $table->string('ssc_board')->nullable();
        $table->string('ssc_testimonial')->nullable();
        $table->string('ssc_marksheet')->nullable();
        $table->string('previous_school')->nullable();
        $table->text('previous_school_address')->nullable();
        $table->string('admission_test_roll')->nullable();
        $table->string('admission_test_result')->nullable();
        $table->string('transfer_certificate')->nullable();
        $table->string('scholarship_info')->nullable();
        $table->string('scholarship_proof')->nullable();
        $table->string('teacher_reference')->nullable();
        $table->date('admite_date')->nullable();
        $table->string('course')->nullable();
        $table->decimal('admission_fee', 15, 2)->nullable();
        $table->string('admission_fee_receipt')->nullable();
        $table->text('disabilities')->nullable();
        $table->text('health_insurance')->nullable();
        $table->text('extra_curriculum')->nullable();
        $table->text('agreement')->nullable();
        $table->text('student_signature')->nullable();
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
