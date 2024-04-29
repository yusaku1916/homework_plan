<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_student extends Model
{
    use HasFactory;
    public function teacher()
        {
            return $this->belongsTo(Teacher::class);
        }
    public function student()
        {
            return $this->belongsTo(Student::class);
        }
}
