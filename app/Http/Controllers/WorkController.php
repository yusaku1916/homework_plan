<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Teacher;
use App\Models\Plan;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher_student;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\Auth;


class WorkController extends Controller
{
    public function index(Work $work, Plan $plan, Student $student, Teacher_student $teacher_student, Teacher $teacher)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $user_id = Auth::user()->id;
        //dd($user_id);
        $identify_id = Auth::user()->identify_id;
        if( Auth::user()->identify_id == 1 ){
            $teacher_id = Teacher::where('user_id', $user_id)->first()->id; //get()はダメでfirst()はいいのか。
            //dd($teacher_id);
            $student_id = Teacher_student::where('teacher_id', $teacher_id)->pluck('student_id'); //pluckの使い方
            //dd($student_id);
            if ($student_id->count() == 0){ //pluckメソッドを使うとNULLにならず空の配列が返される。そのためーー。
                //return view('home.screen')->with('identify_id', $identify_id);
                return view('home.screen')
                ->with(['identify_id' => $identify_id,
                        'students' => null]);
            }
            else{
                //dd($student_id);
                $student = Student::whereIn('id', $student_id)->get(); //whereInの使い方
                return view('home.screen')
                ->with(['identify_id' => $identify_id,
                        'students' => $student]);
            }
        }
        elseif( Auth::user()->identify_id == 2 ){
            $student_id = Student::where('user_id', $user_id)->first();
            $teacher_student_id = Teacher_student::where('student_id', $student_id->id)->first();
            $latestWork = Work::where('teacher_student_id', $teacher_student_id->id)->latest()->first();
            //$identify_id = Auth::user()->identify_id;
            if( is_null($latestWork) ){
                return view('home.screen')
                ->with(['works' => $latestWork,
                        'identify_id' => $identify_id,
                        'plans1' => NULL,
                        'plans2' => NULL,
                        'plans3' => NULL,
                        'plans4' => NULL,
                        'plans5' => NULL,
                        'plans6' => NULL,
                        'plans7' => NULL]);
            }else{
            return view('home.screen')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id)]);
            }
        }
    }
    
    public function home_teacher(Request $request, Work $work, Plan $plan, User $user, Teacher $teacer, Teacher_student $teacher_student)
    {   
        $student_id = $request->student_id;
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $teacher_id = $teacher->id;
        $teacher_student_id = Teacher_student::where(['teacher_id' => $teacher_id,
                                                      'student_id' => $student_id])->first();
        $latestWork = Work::where('teacher_student_id', $teacher_student_id->id)->latest()->first();
        $identify_id = Auth::user()->identify_id;
        if( is_null($latestWork) ){
            return view('teacher.screen_teacher')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => NULL,
                    'plans2' => NULL,
                    'plans3' => NULL,
                    'plans4' => NULL,
                    'plans5' => NULL,
                    'plans6' => NULL,
                    'plans7' => NULL ]);
        }else{
            return view('teacher.screen_teacher')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id) ]);
            }
    }
    
    public function create(Request $request, Work $work, Plan $plan, User $user, Teacher $teacer, Teacher_student $teacher_student)
    {
        $student_id = $request->student_id;
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $teacher_id = $teacher->id;
        $teacher_student_id = Teacher_student::where(['teacher_id' => $teacher_id,
                                                      'student_id' => $student_id])->first();
        $latestWork = Work::where('teacher_student_id', $teacher_student_id->id)->latest()->first();
        $identify_id = Auth::user()->identify_id;
        if( is_null($latestWork) ){
            return view('teacher.work_create')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'teacher_student_id' => $teacher_student_id->id,
                    'student_id' => $student_id,
                    'plans1' => NULL,
                    'plans2' => NULL,
                    'plans3' => NULL,
                    'plans4' => NULL,
                    'plans5' => NULL,
                    'plans6' => NULL,
                    'plans7' => NULL]);
        }else{
            return view('teacher.work_create')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'teacher_student_id' => $teacher_student_id->id,
                    'student_id' => $student_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id)]);
        }
    }

    public function homework_store(WorkRequest $request, Work $work)
    {
        $input = $request['work'];
        $student_id = $request->student_id;
        $work->fill($input)->save();
        return redirect()->route('screen.return', ['student_id' => $student_id]);
    }
    
    public function home_teacher_return(Request $request, Work $work, Plan $plan, User $user, Teacher $teacer, Teacher_student $teacher_student, $student_id)
    {   
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $teacher_id = $teacher->id;
        $teacher_student_id = Teacher_student::where(['teacher_id' => $teacher_id,
                                                      'student_id' => $student_id])->first();
        $latestWork = Work::where('teacher_student_id', $teacher_student_id->id)->latest()->first();
        $identify_id = Auth::user()->identify_id;
        if( is_null($latestWork) ){
            return view('teacher.screen_teacher')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => NULL,
                    'plans2' => NULL,
                    'plans3' => NULL,
                    'plans4' => NULL,
                    'plans5' => NULL,
                    'plans6' => NULL,
                    'plans7' => NULL ]);
        }else{
            return view('teacher.screen_teacher')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id) ]);
            }
    }
    //
}
