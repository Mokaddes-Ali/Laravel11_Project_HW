<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'contact_email',
        'contact_phone',
    ];
}

