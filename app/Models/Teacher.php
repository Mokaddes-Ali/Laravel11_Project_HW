<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

      // Table Name (Optional: If table name is not plural of model name)
      protected $table = 'teachers';

      // Fillable attributes for mass assignment
      protected $fillable = [
          'first_name',
          'last_name',
          'email',
          'phone',
          'address',
          'gender',
          'qualification',
          'department',
          'hire_date',
          'status',
          'bio',
          'social_media_links',
          'subjects',
          'photo',
      ];

      // Define default values for attributes (optional)
      protected $attributes = [
          'status' => 'active',
      ];
  }
