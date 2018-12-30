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
    // check  quyền người dùng
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
        $this->middleware('admin');
    }
    // gọi trang giáo viên
    public function teacher()
    {
    	return view('Admin.lecturers.Teacher');
    }
    // edit ra thông tin giáo viên
    public function editUser(Request $request) {
        if($request->ajax()) {
            $user = User::find($request->id);
            return response($user);
        }
    }
    // update thông tin giáo viên
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
    // xóa giáo viên
    public function delete(Request $request)
    {
        if($request->ajax()) {
            ClassQueryUser::delete($request->id);
            return $this->loadUser();
        }
    }
    // lấy ra danh sách tài khoản giáo viên
    public function loadUser(){
        $role_name = 'giaovien';
        $users = ClassQueryUser::showUser($role_name);
        return view('admin.lecturers.ListTeacher', compact('users'))->render();
    }
    // thêm tài khoản giáo viên
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
       return response()->json(['errors'=>'some thing errors']);
    }
    // thêm giáo viên theo danh sách
    public function importTeacher(Request $request)
    {
        if($request->hasFile('FILE')){
            //return Excel::import(new TeacherRegister, request()->file('FILE'));
            Excel::import(new TeacherRegister, request()->file('FILE'));
            return redirect('/teacher')->with('success', 'All good!');
        }
    }
    // thêm tài khoản
    public function createUser(array $data)
    {
        event(new Registered($user = $this->create($data)));

        return redirect($this->redirectPath());
    }

   // thêm tài khoản
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
