<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Teacher;
//use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
    public function index(Work $work)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $latestWork = Work::where('teacher_id', 1)->latest()->first();
        return view('home.screen')->with(['works' => $latestWork]);//$postの中身を戻り値にする。
        //latest()メソッドはviewの中では使えない？からまずデータを渡してからviewに入れてる
    }
    
    public function create(Teacher $teacher)
    {
        return view('teacher.work_create')->with(['teachers' => $teacher->get()]);
    }

    public function homework_store(Request $request, Work $work)
    {
        $input = $request['work'];
        $work->fill($input)->save();
        return redirect('/');
    }
    //
}
