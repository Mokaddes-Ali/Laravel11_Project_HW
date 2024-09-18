<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     */
    // protected $fillable = [
    //     'name',
    //     'date_of_birth',
    //     'gender',
    //     'address',
    //     'religion',
    //     'nationality',
    //     'email',
    //     'phone',
    //     'parents_name',
    //     'parents_phone',
    //     'course',
    //    'admission_date',
    //     'aditional_note',
    //     'additional_note',
    //     'profile_image',
    // ];



    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'photo',
        'dob',
        'gender',
        'nationality',
        'religion',
        'blood_group',
        'national_id',
        'permanent_address',
        'current_address',
        'phone',
        'email',
        'emergency_contact',
        'marital_status',
        'father_name',
        'father_phone',
        'father_education',
        'father_occupation',
        'mother_name',
        'mother_phone',
        'mother_education',
        'mother_occupation',
        'family_income',
        'guardian_name',
        'guardian_relation',
        'guardian_occupation',
        'guardian_number',
        'ssc_roll',
        'ssc_reg',
        'ssc_result',
        'ssc_board',
        'previous_school',
        'admission_test_roll',
        'admission_test_result',
        'scholarship_info',
        'teacher_reference',
        'admite_date',
        'course',
        'admission_fee',
        'disabilities',
        'health_insurance',
        'extra_curriculum',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'family_income' => 'decimal:2',
        'admission_fee' => 'decimal:2',
    ];
}
