<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;
    
    public function plan()
        {
            return $this->belongsTo(Plan::class);
        }
    public function student()
        {
            return $this->belongsTo(Student::class);
        }

        
    public function getSubmitDay(int $plan_number)
        {
            return $this->latest()
            ->firstWhere(['plan_id'=>$plan_number]);
        }
}
