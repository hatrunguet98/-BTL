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
use Illuminate\Support\Facades\DB;

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
            $data = $request->all();
            $validator = "";
            if(!$request->password) {
                $validator = validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'class' => ['required', 'string'],
                ]);
            } else {
                $validator = validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'string', 'min:6','confirmed'],
                    'class' => ['required', 'string'],
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
                            'class' => $data['class'],
                        ]);
                } else {
                    DB::table('users')->where('id', $request->id)
                        ->update([
                            'name' => $data['name'],
                            'password' => Hash::make($data['password']),
                            'class' => $data['class'],
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
        	 return redirect('/student')->with('success', 'All good!');
        }
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
                'class' => ['required', 'string'],
            ]);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            } else {
                $data = $validator->validate();
                $this->createUser($data);
                return $this->loadUser();
            }
            
        }
       return response()->json(['errors'=>'some thing errors']);
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
            'class' => $data['class'],
            'role' => $this->role,
        ]);
    }
}
