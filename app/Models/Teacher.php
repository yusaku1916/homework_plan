<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    public function works()   
        {
            return $this->hasMany(Work::class);  
        }
    public function user()
        {
            return $this->belongsTo(User::class);
        }
    public function teacher_students()   
    {
        return $this->hasMany(Teacher_student::class);  
    }
}
