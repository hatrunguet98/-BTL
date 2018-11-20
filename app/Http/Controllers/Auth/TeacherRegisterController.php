<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Excel;
use App\Imports\TeacherRegister;

class TeacherRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $role = 2;
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

    public function registerTeacher()
    {
    	return view('auth.TeacherRegister');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        return $this->createUser($data);
    }

    public function import()
    {
        return view('auth.TeacherRegisterImport');
    }

    public function importTeacher(Request $request)
    {
        if($request->hasFile('FILE')){
            //return Excel::import(new TeacherRegister, request()->file('FILE'));
            Excel::import(new TeacherRegister, request()->file('FILE'));
            return redirect('/home')->with('success', 'All good!');
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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
            'password' => Hash::make($data['password']),
            'role' => $this->role,
        ]);
    }
}
