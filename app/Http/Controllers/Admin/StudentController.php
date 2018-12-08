<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Excel;
use App\Imports\StudentRegister;
use Illuminate\Support\Facades\Auth;
use App\Services\ClassAdmin\ClassQueryUser;

class StudentController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $role = 1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function student()
    {	        
        return view('admin.students.Student');
    }

    public function editUser(Request $request) {
        if($request->ajax()) {
            $user = User::find($request->id);
            return response($user);
        }
    }

    public function edit (Request $request) {
       if($request->ajax()) {
            $data = "";
            if(!$request->password) {
                $data = $this->validate($request, [
                    'username' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'class' => ['required', 'string'],
                ]);
            } else {
                $data = $this->validate($request, [
                    'username' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'string', 'min:6'],
                    'class' => ['required', 'string'],
                ]);
                if($request->password != $request->confirm_password) {
                    return response(['message' => 'The password confirmation does not match.']);
                }
            }
            $user = User::find($request->id);
            $user->update($data);
            return $this->loadUser();
       }
       return response(['message' => 'something ERROR']);
    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            ClassQueryUser::delete($request->id);
            return response(['message' => 'student deleted succesfully']);
        }
    }

    public function loadUser(){
        $role_name = 'sinhvien';
        $users = ClassQueryUser::showUser($role_name);
        return view('admin.students.ListStudent', compact('users'))->render();
    }

    public function importStudent(Request $request)
    {
    	if($request->hasFile('FILE')){
        	Excel::import(new StudentRegister, request()->file('FILE'));
        	//$data =  $this->excel->import(new StudentRegister, request()->file('FILE'));
        	 return redirect('/student')->with('success', 'All good!');
        }
    }

    public function register(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $this->createUser($data);
            
            return $this->loadUser();
        }
    }

    public function createUser(array $data)
    {
        $this->validator($data)->validate();
        event(new Registered($user = $this->create($data)));

        //$this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'class' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'class' => $data['class'],
            'role' => $this->role,
        ]);
    }
}
