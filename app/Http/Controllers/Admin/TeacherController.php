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
use App\Imports\TeacherRegister;
use Illuminate\Support\Facades\Auth;
use App\Services\ClassAdmin\ClassQueryUser;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
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

    public function teacher()
    {
    	return view('Admin.lecturers.Teacher');
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
                if(!$request->password){
                    DB::table('users')->where('id', $request->id)
                        ->update([
                            'name' => $data['name'],
                        ]);
                } else {
                    DB::table('users')->where('id', $request->id)
                        ->update([
                            'name' => $data['name'],
                            'password' => Hash::make($data['password']),
                        ]);
                }
                return $this->loadUser();
            }
       }
       return response()->json(['errors'=>'some thing errors']);
    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            ClassQueryUser::delete($request->id);
            return $this->loadUser();
        }
    }

    public function loadUser(){
        $role_name = 'giaovien';
        $users = ClassQueryUser::showUser($role_name);
        return view('admin.lecturers.ListTeacher', compact('users'))->render();
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
                if(!$request->password){
                    DB::table('users')->where('id', $request->id)
                        ->update([
                            'name' => $data['name'],
                        ]);
                } else {
                    DB::table('users')->where('id', $request->id)
                        ->update([
                            'name' => $data['name'],
                            'password' => Hash::make($data['password']),
                        ]);
                }
                return $this->loadUser();
            }
            
        }
       return response()->json(['errors'=>'some thing errors']);
    }

    public function importTeacher(Request $request)
    {
        if($request->hasFile('FILE')){
            //return Excel::import(new TeacherRegister, request()->file('FILE'));
            Excel::import(new TeacherRegister, request()->file('FILE'));
            return redirect('/teacher')->with('success', 'All good!');
        }
    }


    public function createUser(array $data)
    {
        event(new Registered($user = $this->create($data)));


        return redirect($this->redirectPath());
    }

   
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
