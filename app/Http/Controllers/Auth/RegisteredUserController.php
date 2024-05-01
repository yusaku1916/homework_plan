<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Teacher_student;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create_1(): View
    {
        return view('select_TorS');
    }
    
    public function store_1(Request $request): RedirectResponse
    {
        //$identify_Id = $request->input('identify_id');
        //return back()->with('identify_Id', $identify_Id);
        
        $identify_Id = $request->input('identify_id');
        //$request->session()->put('identify_id', $identify_Id);
        //return redirect('/register/1');
        //return redirect('/register/1')->with('identify_Id', $identify_Id);
        if($identify_Id == 1){
            return redirect('register/teacher');
        }
        
        if($identify_Id == 2){
            return redirect('register/student');
        }
    }
    
    public function create_teacher(): View
    {
        return view('auth.register_teacher');
    }
    
    public function create_student(Teacher $teacher): View
    {
        return view('auth.register_student')->with('teachers', $teacher->get());
    }
    
    public function create(Request $request): View
    {
        //$identify_Id = $request->session()->pull('identify_id', 0);
        return view('auth.register');
        //return view('auth.register')->with(['identify_id'=>$identify_Id]);
    }

    /*public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }*/

    public function store_teacher(Request $request, Teacher $teacher): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'identify_id' => $request->identify_id,
        ]);

        event(new Registered($user));
        
        $user_id = $user->id;
        
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->user_id = $user_id;
        $teacher->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }



    public function store_student(Request $request, Student $student, Teacher_student $teacher_student): RedirectResponse
    
    {   $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //'gender' => ['required', 'integer'],
            //'grade' => ['required', 'integer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'identify_id' => $request->identify_id,
        ]);

        event(new Registered($user));
        
        $user_id = $user->id;
        
        $student->name = $request->name;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->grade = $request->grade;
        $student->user_id = $user_id;
        $student->save();
        
        $student_id = $student->id;
        
        $teacher_student->student_id = $student_id;
        $teacher_student->teacher_id = $request->teacher_id;
        $teacher_student->save();

        Auth::login($user);
        

        return redirect(RouteServiceProvider::HOME);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     /**
    public function store(Request $request, Teacher $teacher, Student $srudent): RedirectResponse
    {
        $identifyId = $request->identify_id;
        if($identifyId == 1){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            
    
            $teacher = Teacher::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($teacher));
    
            Auth::login($teacher);
        }
        else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'gender' => ['required', 'integer'],
                'grade' => ['required', 'integer'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            
            //if ($request->fails()) {
            //    return redirect()->back()->with('identify_Id',1)->withErrors($request->errors())->withInput();
            //}
    
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'grade' => $request->grade,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($student));
    
            Auth::login($student);
        }

        return redirect(RouteServiceProvider::HOME);
    }*/

}