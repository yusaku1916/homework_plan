<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Teacher;
use App\Models\Plan;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
    public function index(Work $work, Plan $plan)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $latestWork = Work::where('teacher_id', 1)->latest()->first();
        return view('home.screen')
        ->with(['works' => $latestWork,
                'plans1' => $plan->getPlanDay(1, $latestWork->id),
                'plans2' => $plan->getPlanDay(2, $latestWork->id),
                'plans3' => $plan->getPlanDay(3, $latestWork->id),
                'plans4' => $plan->getPlanDay(4, $latestWork->id),
                'plans5' => $plan->getPlanDay(5, $latestWork->id),
                'plans6' => $plan->getPlanDay(6, $latestWork->id),
                'plans7' => $plan->getPlanDay(7, $latestWork->id)]);//$postの中身を戻り値にする。
        //latest()メソッドはviewの中では使えない？からまずデータを渡してからviewに入れてる
    }
    
    public function create(Teacher $teacher, Work $work, Plan $plan)
    {
        $latestWork = Work::where('teacher_id', 1)->latest()->first();
        return view('teacher.work_create')
        ->with(['works' => $latestWork,
                'teachers' => $teacher->get(),
                'plans1' => $plan->getPlanDay(1, $latestWork->id),
                'plans2' => $plan->getPlanDay(2, $latestWork->id),
                'plans3' => $plan->getPlanDay(3, $latestWork->id),
                'plans4' => $plan->getPlanDay(4, $latestWork->id),
                'plans5' => $plan->getPlanDay(5, $latestWork->id),
                'plans6' => $plan->getPlanDay(6, $latestWork->id),
                'plans7' => $plan->getPlanDay(7, $latestWork->id)
                ]);
    }

    public function homework_store(WorkRequest $request, Work $work)
    {
        $input = $request['work'];
        $work->fill($input)->save();
        return redirect('/');
    }
    //
}
