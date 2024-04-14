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
        'teacher_id',
    ];
    
    //「1対多」の関係なので単数系に
    public function teacher()
        {
            return $this->belongsTo(Teacher::class);
        }
}

