<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }
    
    public function student(){
    	return view('user.student.students');
    }
}
