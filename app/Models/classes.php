<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes'; // টেবিলের নাম উল্লেখ করতে হবে

    protected $fillable = [
        'name',
        'description',
    ];
}
