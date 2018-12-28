<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    		$user_course_id = $request->id;
    		$course_id = DB::table('user_courses')->where('id',$user_course_id)->first()->course_id;
	    	$data = DB::table('user_courses')
	    		->join('surveys','surveys.id', '=', 'user_courses.survey_id')
	    		->where('user_courses.course_id', $course_id)
	    		->get();
	    	$course = DB::table('courses')->where('id',$course_id)->first();
	    	$criterion = json_decode($course->criterion);
	    	$temp = DB::table('criteria')->get();
            $criteria = array();
            foreach ($temp as $key => $value) {
                $criteria += [
                    $value->id => $value,
                ];
            }
	    	foreach ($criterion as $key => $value) {
	    		$results[] = [
	    			'id' => $criteria[$value]->id,
	    			'name' => $criteria[$value]->name,
	    			'M' => '0',
	    			'STD' => '1',
	    			'M1' => '1',
	    			'STD1' => '1',
	    			'M2' => '1',
	    			'STD2' => '1',
	    		];
	    	}
	    	$types = DB::table('criteria')->select('type')->distinct()->get();
            $type = array();
            $i = 0;
            foreach ($types as $key => $value){
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }
	        return view('user.teacher.result.result', compact('results','type'));
    	}
    }
}
