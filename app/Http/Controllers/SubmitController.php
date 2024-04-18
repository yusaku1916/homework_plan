<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Day;
use App\Models\Teacher;
use App\Models\Plan;
use App\Models\Submit;

class SubmitController extends Controller
{
    public function submit_create(Work $work, Day $day){
        $latestWork = Work::where('teacher_id', 1)->latest()->first();
        return view('student.submit')
        ->with(['works' => $latestWork,
                'work_number' => $latestWork->id,
                'days' => $day->get()]);
    }
    public function submit_store(Request $request, Submit $submit, Work $work, Plan $plan){
        $latestWork_id = Work::where('teacher_id', 1)->latest()->first()->id;
        $day_number = $request->D_number;
        $plan_id = Plan::where(['work_id'=>$latestWork_id, 'day_id'=>$day_number])->latest()->first()->id;
        $input = $request['submit'];
        $submit->content = $request->content;
        $submit->plan_id = $plan_id;
        $submit->student_id = $request->student_id ;
        $submit->save();
        return redirect('/');
        return view('student.submit');
    }
    //
}
