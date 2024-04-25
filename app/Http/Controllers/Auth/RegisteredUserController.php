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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create_1(): View
    {
        return view('register-1');
    }
    
    public function store_1(Request $request): RedirectResponse
    {
        return redirect('/register/1')->with('identify_Id',$request->identify_id);
    }
    
    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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
    }
}
