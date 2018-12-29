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
use App\Imports\AdminRegister;
use Illuminate\Support\Facades\Auth;
use App\Services\ClassAdmin\ClassQueryUser;

class AdminController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $role = 0;
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

    public function admin()
    {
    	return view('Admin.admins.Admin');
    }

    public function editUser(Request $request) {
        if($request->ajax()) {
            $user = User::find($request->id);
            return response($user);
        }
    }

    public function edit (Request $request) {
       if($request->ajax()) {
            $data = $request->all();
            $validator = "";
            if(!$request->password) {
                $validator = validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                ]);
            } else {
                $validator = validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'string', 'min:6','confirmed'],
                ]);
            }
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            } else {
                $data = $validator->validate();
                $user = User::find($request->id);
                $user->update($data);
                return $this->loadUser();
            }
       }
       return response(['message' => 'something ERROR']);
    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            ClassQueryUser::delete($request->id);
            return $this->loadUser();
        }
    }

    public function loadUser(){
        $role_name = 'admin';
        $users = ClassQueryUser::showUser($role_name);
        return view('admin.admins.ListAdmin', compact('users'))->render();
    }
    
    public function register(Request $request)
    {
       if($request->ajax()){
            $data = $request->all();
            $validator = Validator::make($data, [
                'username' => ['required', 'string', 'max:255','unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            } else {
                $data = $validator->validate();
                $this->createUser($data);
                return $this->loadUser();
            }
            
        }
    }

    public function importAdmin(Request $request)
    {
        if($request->hasFile('FILE')){
            //return Excel::import(new TeacherRegister, request()->file('FILE'));
            Excel::import(new AdminRegister, request()->file('FILE'));
            return redirect('/admin')->with('success', 'All good!');
        }
    }


    public function createUser(array $data)
    {
        event(new Registered($user = $this->create($data)));


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
            'name' => ['required', 'string', 'max:255'],
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
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'role' => $this->role,
        ]);
    }
}
