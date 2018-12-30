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
use Illuminate\Support\Facades\DB;

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
    // hàm middware xác đinh quyền truy cập của user
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
        $this->middleware('admin');
    }
    // view đên trang admin
    public function admin()
    {
    	return view('Admin.admins.Admin');
    }
    // edit ra tài khoản admin
    public function editUser(Request $request) {
        if($request->ajax()) {
            $user = User::find($request->id);
            return response($user);
        }
    }
    // submit tài khoản admin
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
       return response(['message' => 'something ERROR']);
    }
    // deletete tài khoản admin
    public function delete(Request $request)
    {
        if($request->ajax()) {
            ClassQueryUser::delete($request->id);
            return $this->loadUser();
        }
    }
    // lấy ra tài khoản
    public function loadUser(){
        $role_name = 'admin';
        $users = ClassQueryUser::showUser($role_name);
        return view('admin.admins.ListAdmin', compact('users'))->render();
    }
    // thêm tài khoản cho user và xác đinh người dùng
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
            // gửi lại kết quả fails
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
    // import tài khoản admin
    public function importAdmin(Request $request)
    {
        if($request->hasFile('FILE')){
            Excel::import(new AdminRegister, request()->file('FILE'));
            return redirect('/admin')->with('success', 'All good!');
        }
    }

    // thêm tài khoản
    public function createUser(array $data)
    {
        event(new Registered($user = $this->create($data)));

        return redirect($this->redirectPath());
    }
    // thêm tài khoản vào databases
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
