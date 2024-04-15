<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'day_id',
        'work_id',
        'student_id',
    ];
    
    //「1対多」の関係なので単数系に
    public function day()
        {
            return $this->belongsTo(Day::class);
        }
    public function work()
        {
            return $this->belongsTo(Work::class);
        }
    public function student()
        {
            return $this->belongsTo(Student::class);
        }

}
