<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'work.content' => 'required|string|max:200',
            'work.coment' => 'required|string|max:200',
            'work.teacher_student_id' => 'required|integer',
        ];
    }
}
