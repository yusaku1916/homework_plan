<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'coment',
        'teacher_student_id',
    ];
    
    //「1対多」の関係なので単数系に
    public function teacher()
        {
            return $this->belongsTo(Teacher::class);
        }

    public function getNew(int $teacher_number)
        {
            $NewWork = Plan::where('teacher_id', $teacher_number)->latest()->first();
            return $this->$NewWork;
        }
}

