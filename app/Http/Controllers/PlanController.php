<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Teacher;
use App\Models\Work;
use App\Models\Student;
use App\Models\Teacher_student;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function plan_create(Teacher $teacher)
    {
        $user_id = Auth::user()->id;
        $student_id = Student::where('user_id', $user_id)->first()->id;
        $teacher_student_id = Teacher_student::where('student_id', $student_id)->first()->id;
        $latestWork = Work::where('teacher_student_id', $teacher_student_id)->latest()->first();
        // dd($latestWork);
        if(is_null($latestWork)){
            session()->flash('message', '先生が宿題を出してくれるのを待とう！');
            return redirect()->route('screen', ['student_id' => $student_id]);
        }
        else{
            return view('student.plan_create')
            ->with(['works' => $latestWork,
                    'work_number' => $latestWork->id]);
        }
    }
    
    public function plan_store(Request $request, Plan $plan)
    {
        for($i=0; $i<=6; $i++){
            $plan = new $plan();
            $input = $request['plan'];
            $plan->fill($input);
            $plan->day_id = $request->day_id[$i];
            $plan->content = $request->content[$i];
            dd($plan);
            $plan->save();
        }
        return redirect(route('screen'));
        
        
    }

    //
}
