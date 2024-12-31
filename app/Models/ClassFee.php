<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassFee extends Model
{
    use HasFactory;

    protected $table = 'class_fees';

    protected $fillable = ['class_name', 'admission_fee'];
}

