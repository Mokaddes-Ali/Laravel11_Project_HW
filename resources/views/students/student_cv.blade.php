<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo {
            max-width: 150px;
            border: 5px solid #007bff;
            border-radius: 50%;
        }

        h1 {
            color: #007bff;
            margin-top: 10px;
        }

        .email {
            color: #333;
            margin-top: 5px;
        }

        .details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .details .section {
            flex: 1 1 calc(50% - 20px);
            box-sizing: border-box;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
        }

        .details h2 {
            color: #fff;
            border-bottom: 2px solid #fff;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 5px;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Section Background Colors - Lighter Shades */
        .section-personal { background-color: #d4eaf7; } /* Light Blue */
        .section-contact { background-color: #d9f5ec; } /* Light Green */
        .section-family { background-color: #f9e7d1; } /* Light Orange */
        .section-guardian { background-color: #e9def4; } /* Light Purple */
        .section-academic { background-color: #f6d4d4; } /* Light Red */
        .section-additional { background-color: #d6dee4; } /* Light Gray-Blue */

        /* Data Colors */
        .data-name { color: #2c3e50; } /* Dark blue */
        .data-photo { color: #16a085; } /* Teal */
        .data-dob { color: #e74c3c; } /* Red */
        .data-gender { color: #8e44ad; } /* Purple */
        .data-nationality { color: #2980b9; } /* Blue */
        .data-religion { color: #f39c12; } /* Yellow */
        .data-blood-group { color: #c0392b; } /* Dark red */
        .data-contact { color: #27ae60; } /* Green */
        .data-email { color: #16a085; } /* Teal */
        .data-address { color: #8e44ad; } /* Purple */
        .data-family { color: #d35400; } /* Orange */
        .data-guardian { color: #9b59b6; } /* Purple */
        .data-academic { color: #e74c3c; } /* Red */
        .data-additional { color: #34495e; } /* Dark blue */
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <img src="{{ $student->photo }}" alt="Student Photo" class="photo">
            <h1><span class="data-name">{{ $student->name }}</span></h1>
            <p class="email"><span class="data-email">{{ $student->email }}</span></p>
        </div>
        <div class="details">
            <!-- Personal Details Section -->
            <div class="section section-personal">
                <h2>Personal Details</h2>
                <ul>
                    <li>Date of Birth: <span class="data-dob">{{ $student->dob }}</span></li>
                    <li>Gender: <span class="data-gender">{{ $student->gender }}</span></li>
                    <li>Nationality: <span class="data-nationality">{{ $student->nationality }}</span></li>
                    <li>Religion: <span class="data-religion">{{ $student->religion }}</span></li>
                    <li>Blood Group: <span class="data-blood-group">{{ $student->blood_group }}</span></li>
                    <li>National ID: {{ $student->national_id }}</li>
                </ul>
            </div>

            <!-- Contact Details Section -->
            <div class="section section-contact">
                <h2>Contact Details</h2>
                <ul>
                    <li>Permanent Address: <span class="data-address">{{ $student->permanent_address }}</span></li>
                    <li>Current Address: <span class="data-address">{{ $student->current_address }}</span></li>
                    <li>Phone: <span class="data-contact">{{ $student->phone }}</span></li>
                    <li>Email: <span class="data-email">{{ $student->email }}</span></li>
                    <li>Emergency Contact: {{ $student->emergency_contact }}</li>
                </ul>
            </div>

            <!-- Family Details Section -->
            <div class="section section-family">
                <h2>Family Details</h2>
                <ul>
                    <li>Father's Name: <span class="data-family">{{ $student->father_name }}</span></li>
                    <li>Father's Phone: {{ $student->father_phone }}</li>
                    <li>Father's Education: {{ $student->father_education }}</span></li>
                    <li>Father's Occupation: {{ $student->father_occupation }}</li>
                    <li>Mother's Name: <span class="data-family">{{ $student->mother_name }}</span></li>
                    <li>Mother's Phone: {{ $student->mother_phone }}</li>
                    <li>Mother's Education: {{ $student->mother_education }}</li>
                    <li>Mother's Occupation: {{ $student->mother_occupation }}</li>
                    <li>Family Income: {{ $student->family_income }}</li>
                </ul>
            </div>

            <!-- Academic Details Section -->
            <div class="section section-academic">
                <h2>Academic Details</h2>
                <ul>
                    <li>SSC Roll: <span class="data-academic">{{ $student->ssc_roll }}</span></li>
                    <li>SSC Registration: {{ $student->ssc_reg }}</li>
                    <li>SSC Result: {{ $student->ssc_result }}</li>
                    <li>SSC Board: {{ $student->ssc_board }}</li>
                    <li>Previous School: {{ $student->previous_school }}</li>
                    <li>Admission Test Roll: {{ $student->admission_test_roll }}</li>
                    <li>Admission Test Result: {{ $student->admission_test_result }}</li>
                </ul>
            </div>



            <!-- Additional Information Section -->
            <div class="section section-additional">
                <h2>Additional Information</h2>
                <ul>
                    <li>Scholarship Info: {{ $student->scholarship_info }}</li>
                    <li>Teacher Reference: {{ $student->teacher_reference }}</li>
                    <li>Admission Date: {{ $student->admite_date }}</li>
                    <li>Course: {{ $student->course }}</li>
                    <li>Admission Fee: {{ $student->admission_fee }}</li>
                    <li>Disabilities: {{ $student->disabilities }}</li>
                    <li>Health Insurance: {{ $student->health_insurance }}</li>
                    <li>Extra Curriculum: {{ $student->extra_curriculum }}</li>
                </ul>
            </div>

             <!-- Guardian Details Section -->
             <div class="section section-guardian">
                <h2>Guardian Details</h2>
                <ul>
                    <li>Guardian's Name: <span class="data-guardian">{{ $student->guardian_name }}</span></li>
                    <li>Guardian's Relation: {{ $student->guardian_relation }}</li>
                    <li>Guardian's Occupation: {{ $student->guardian_occupation }}</li>
                    <li>Guardian's Number: {{ $student->guardian_number }}</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
