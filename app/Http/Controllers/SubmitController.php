<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Day;
use App\Models\Teacher;
use App\Models\Plan;
use App\Models\Submit;
use App\Models\Student;
use App\Models\Teacher_student;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubmitRequest;
use Cloudinary;  //use宣言するのを忘れずに

class SubmitController extends Controller
{
    public function submit_create(Work $work, Day $day){
        $user_id = Auth::user()->id;
        $student_id = Student::where('user_id', $user_id)->first()->id;
        $teacher_student_id = Teacher_student::where('student_id', $student_id)->first()->id;
        $latestWork = Work::where('teacher_student_id', $teacher_student_id)->latest()->first();
        return view('student.submit')
        ->with(['works' => $latestWork,
                'work_number' => $latestWork->id,
                'days' => $day->get()]);
    }
    public function submit_store(SubmitRequest $request, Submit $submit, Work $work, Plan $plan, Teacher_student $teacher_student){
        
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($image_url);  //画像のURLを画面に表示
        
        $user_id = Auth::user()->id;
        $student_id = Student::where('user_id', $user_id)->first()->id;
        $teacher_student_id = Teacher_student::where('student_id', $student_id)->first()->id;
        $latestWork_id = Work::where('teacher_student_id', $teacher_student_id)->latest()->first()->id;
        $day_number = $request->D_number;
        $plan_id = Plan::where(['work_id'=>$latestWork_id, 'day_id'=>$day_number])->latest()->first()->id;
        $input = $request['submit'];
        $submit->content = $request->content;
        $submit->plan_id = $plan_id;
        $submit->student_id = $request->student_id ;
        $submit->image_id = $image_url;
        //$submit->image = $request->image;
        $submit->save();
        return redirect('/');
    }
    //
}
