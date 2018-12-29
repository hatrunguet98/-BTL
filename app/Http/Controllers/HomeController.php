<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassAdmin\ClassRoleAdmin;
use App\Services\ClassUser\ClassRoleUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(ClassRoleAdmin::checkAdmin()){
                return redirect('dashboard');
            } else {
                return redirect('/welcome');
            }
        } else {
            return redirect('/welcome');
        }
    }

    public function home()
    {
        if(Auth::check()){
            if(ClassRoleAdmin::checkAdmin()){
                return redirect('dashboard');
            } else if(ClassRoleUser::CheckTeacher()) {
                return redirect('/teachers');
            } else if(ClassRoleUser::CheckStudent()) {
                return redirect('/students');
            }
        } else {
            return redirect('/welcome');
        }
    }
}
