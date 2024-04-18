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

        
    public function getPlanDay(int $day_number, int $work_number)
        {
            return $this->latest()
            ->firstWhere(['day_id'=>$day_number,
                        'work_id'=>$work_number]);
        }
}
