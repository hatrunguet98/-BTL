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
	    	$evaluate = array();
	    	foreach ($data as $key => $value) {
	    		$array = $value->evaluate;
	    		$array = json_decode($array);
	    		$evaluate[] = $array;
	    	}
	    	$i = sizeof($evaluate);
	    	$val = $evaluate[0];
	    	$criteria = DB::table('criteria')->get();
	    	$results = array();
	    	foreach ($val as $key => $value) {
	    		$results[] = [
	    			'id' => $criteria[$key-1]->id,
	    			'name' => $criteria[$key-1]->name,
	    			'M' => $value,
	    			'STD' => '1',
	    			'M1' => '1',
	    			'STD1' => '1',
	    			'M2' => '1',
	    			'STD2' => '1',
	    		];
	    	}
	    	/*dd($val);
	    	foreach ($val as $key => $value) {
	    		$val[$key] = floatval($value);
	    	}
	    	foreach ($evaluate as $key => $values) {
	    		if($key){
	    			foreach ($value as $k => $va) {
	    				$val[$key] += floatval($va);
	    			}
	    		}
	    	}
	    	foreach ($evaluate as $key => $value) {
	    		dd($value);
	    		//$evaluate[$key] = $value / $i;
	    	}
	    	dd($evaluate);*/
	        return view('user.teacher.result.result', compact('results'));
    	}
    }
}
