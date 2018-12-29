<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\ClassResultSurvey;

class TeacherController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }
    
    public function teacher(){
    	$id = Auth::user()->id;
    	$courses = DB::table('courses')
                    ->select('courses.id as course_id', 'courses.name as course_name', 'courses.code as code', 'user_courses.id as user_courses_id')
    				->join('user_courses','user_courses.course_id', '=', 'courses.id')
    				->join('users','users.id', '=', 'user_courses.user_id')
    				->where('users.id',$id)
                    ->get();
   		return view('user.teacher.teacher', compact('courses'));
    }

    public function result(Request $request) {
        if($request->ajax()){
            $cal = new ClassResultSurvey;
            if(!$cal->resultSurvey($request)){
                return response()->json(['errors'=>'Đánh giá môn học chưa kết thúc !']);
            } else {
                return view('user.teacher.result.result', $cal->resultSurvey($request));
            }
        }
    }
}
