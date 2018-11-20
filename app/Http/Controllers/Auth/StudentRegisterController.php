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
use App\Imports\StudentRegister;

class StudentRegisterController extends Controller
{
     use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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

    public function registerStudent()
    {
    	return view('auth.StudentRegister');
    }

    public function import()
    {
    	return view('auth.StudentRegisterImport');
    }

    public function importStudent(Request $request)
    {
    	if($request->hasFile('FILE')){
        	Excel::import(new StudentRegister, request()->file('FILE'));
        	//$data =  $this->excel->import(new StudentRegister, request()->file('FILE'));
        	 return redirect('/home')->with('success', 'All good!');
        }
    }

   /* public static function importData(array $datas)
    {
    	foreach ($datas as $data) {
    		$rel = [
    			'username' => $data[1],
    			'password' => $data[2],
    			'email' => $data[4],
    			'course' => $data[5],
    		];
    		$this->createUser($rel);
    	}
    }*/

    public function register(Request $request)
    {
        $data = $request->all();
        return $this->createUser($data);
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
            'course' => ['required', 'string'],
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
    	dd($data);
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'course' => $data['course'],
            'role' => $this->role,
        ]);
    }
}
