<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }
    
    public function teacher(){
   		return view('user.teacher.teacher');
    }
}
