<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function plans()   
        {
            return $this->hasMany(Plan::class);  
        }
    public function user()
        {
            return $this->belongsTo(User::class);
        }
    public function teacher_student()
        {
            return $this->belongsTo(Teacher_student::class);
        }
}
