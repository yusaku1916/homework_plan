<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Teacher;
use App\Models\Plan;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher_student;
use App\Models\Submit;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class WorkController extends Controller
{
    public function start()
    {
        return view('home.start');
    }
    
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
                return view('teacher.top')->with(['students' => null]);
            }
            else{
                //dd($student_id);
                $student = Student::whereIn('id', $student_id)->get(); //whereInの使い方
                return view('teacher.top')
                ->with(['students' => $student]);
            }
        }
        elseif( Auth::user()->identify_id == 2 ){
            $student_id = Student::where('user_id', $user_id)->first()->id;
            $teacher_student_id = Teacher_student::where('student_id', $student_id)->first()->id;
            $latestWork = Work::where('teacher_student_id', $teacher_student_id)->latest()->first();
            //$identify_id = Auth::user()->identify_id;
            if( is_null($latestWork) ){
                return view('student.top')
                ->with(['works' => $latestWork,
                        'plans1' => NULL,
                        'plans2' => NULL,
                        'plans3' => NULL,
                        'plans4' => NULL,
                        'plans5' => NULL,
                        'plans6' => NULL,
                        'plans7' => NULL]);
            }else{
            return view('student.top')
            ->with(['works' => $latestWork,
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
    
    public function home_teacher(Request $request, Work $work, Plan $plan, User $user, Teacher $teacer, Teacher_student $teacher_student, Submit $submit)
    {   
        $student_id = $request->student_id;
        // dd($student_id);
        $identify_id = Auth::user()->identify_id;
        $teacher_id = Teacher::where('user_id', Auth::user()->id)->first()->id;
        // dd($teacher_id);
        //$teacher_id = $teacher->id;
        $teacher_student_id = Teacher_student::where(['teacher_id' => $teacher_id,
                                                      'student_id' => $student_id])->first();
        // dd($teacher_student_id);
        $latestWork = Work::where('teacher_student_id', $teacher_student_id->id)->latest()->first();
        if( is_null($latestWork) ){
            return view('teacher.home')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => NULL,
                    'plans2' => NULL,
                    'plans3' => NULL,
                    'plans4' => NULL,
                    'plans5' => NULL,
                    'plans6' => NULL,
                    'plans7' => NULL,
                    'submits1' => NULL,
                    'submits2' => NULL,
                    'submits3' => NULL,
                    'submits4' => NULL,
                    'submits5' => NULL,
                    'submits6' => NULL,
                    'submits7' => NULL]);
        }elseif(is_null( $plan->getPlanDay(1, $latestWork->id))){
            return view('teacher.home')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id),
                    'submits1' => $plan->getPlanDay(1, $latestWork->id),
                    'submits2' => NULL,
                    'submits3' => NULL,
                    'submits4' => NULL,
                    'submits5' => NULL,
                    'submits6' => NULL,
                    'submits7' => NULL]);
        }else{
            return view('teacher.home')
            ->with(['works' => $latestWork,
                    'identify_id' => $identify_id,
                    'student_id' => $student_id,
                    'plans1' => $plan->getPlanDay(1, $latestWork->id),
                    'plans2' => $plan->getPlanDay(2, $latestWork->id),
                    'plans3' => $plan->getPlanDay(3, $latestWork->id),
                    'plans4' => $plan->getPlanDay(4, $latestWork->id),
                    'plans5' => $plan->getPlanDay(5, $latestWork->id),
                    'plans6' => $plan->getPlanDay(6, $latestWork->id),
                    'plans7' => $plan->getPlanDay(7, $latestWork->id),
                    'submits1' => $submit->getSubmitDay($plan->getPlanDay(1, $latestWork->id)->id),
                    'submits2' => $submit->getSubmitDay($plan->getPlanDay(2, $latestWork->id)->id),
                    'submits3' => $submit->getSubmitDay($plan->getPlanDay(3, $latestWork->id)->id),
                    'submits4' => $submit->getSubmitDay($plan->getPlanDay(4, $latestWork->id)->id),
                    'submits5' => $submit->getSubmitDay($plan->getPlanDay(5, $latestWork->id)->id),
                    'submits6' => $submit->getSubmitDay($plan->getPlanDay(6, $latestWork->id)->id),
                    'submits7' => $submit->getSubmitDay($plan->getPlanDay(7, $latestWork->id)->id) ]);
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
    
    public function create_return(Request $request, Work $work, Plan $plan, User $user, Teacher $teacer, Teacher_student $teacher_student)
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

    public function homework_store(Request $request, Work $work)
    {
        $student_id = $request->student_id;
        /*$validator = $request->getValidatorInstance();
        if ($validator->fails()) {
            return redirect()->route('work.create', ['student_id' => $student_id]);
        }*/
        $input = $request['work'];
        $work->fill($input);
        $validator = Validator::make($request->all(), [
            'work.content' => ['required', 'string', 'max:200'],
            'work.coment' => ['required', 'string', 'max:200'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('work.create.return', ['student_id' => $student_id])
                   ->withErrors(['error' => '不正な操作です。']);
        }else{
            //$student_id = $request->student_id;
            $work->save();
            return redirect()->route('screen.return', ['student_id' => $student_id]);
        }
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
                    'plans7' => NULL,
                    'submits1' => NULL,
                    'submits2' => NULL,
                    'submits3' => NULL,
                    'submits4' => NULL,
                    'submits5' => NULL,
                    'submits6' => NULL,
                    'submits7' => NULL]);
        }elseif(is_null( $plan->getPlanDay(1, $latestWork->id))){
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
                    'plans7' => $plan->getPlanDay(7, $latestWork->id),
                    'submits1' => $plan->getPlanDay(1, $latestWork->id),
                    'submits2' => NULL,
                    'submits3' => NULL,
                    'submits4' => NULL,
                    'submits5' => NULL,
                    'submits6' => NULL,
                    'submits7' => NULL]);
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
                    'plans7' => $plan->getPlanDay(7, $latestWork->id),
                    'submits1' => $submit->getSubmitDay($plan->getPlanDay(1, $latestWork->id)->id),
                    'submits2' => $submit->getSubmitDay($plan->getPlanDay(2, $latestWork->id)->id),
                    'submits3' => $submit->getSubmitDay($plan->getPlanDay(3, $latestWork->id)->id),
                    'submits4' => $submit->getSubmitDay($plan->getPlanDay(4, $latestWork->id)->id),
                    'submits5' => $submit->getSubmitDay($plan->getPlanDay(5, $latestWork->id)->id),
                    'submits6' => $submit->getSubmitDay($plan->getPlanDay(6, $latestWork->id)->id),
                    'submits7' => $submit->getSubmitDay($plan->getPlanDay(7, $latestWork->id)->id) ]);
            }
    }
    //
}
