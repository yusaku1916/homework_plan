<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Teacher;
use App\Models\Work;

class PlanController extends Controller
{
    public function plan_create(Teacher $teacher)
    {
        $latestWork = Work::where('teacher_id', 1)->latest()->first();
        return view('student.plan_create')->with(['works' => $latestWork]);
    }
    
    public function plan_store(Request $request, Plan $plan)
    {
        $input = $request['plan'];
        $plan->fill($input)->save();
        return redirect('/plans/create');
        
    }

    //
}
