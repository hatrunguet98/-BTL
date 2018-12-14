<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }
    
    public function student(){
    	$id = Auth::user()->id;
    	$courses = DB::table('courses')
                    ->select('courses.id as course_id', 'courses.name as course_name', 'courses.code as code')
    				->join('user_courses','user_courses.course_id', '=', 'courses.id')
    				->join('users','users.id', '=', 'user_courses.user_id')
    				->where('users.id',$id)
                    ->get();
    	return view('user.student.students', compact('courses'));
    }

    public function survey(Request $request) {
    	if($request->ajax()){
            $user_id = Auth::user()->id;
            $course_id = $request->id;
            $courses = DB::table('courses')
                        ->select('courses.id as course_id', 'courses.criterion as criterion', 'courses.name as course_name', 'courses.code as code', 'users.id as user_id')
                        ->join('user_courses','user_courses.course_id', '=', 'courses.id')
                        ->join('users','users.id', '=', 'user_courses.user_id')
                        ->where('users.id',$user_id)
                        ->where('courses.id', $course_id)
                        ->first();
            $criterion = json_decode($courses->criterion);

            $criteria = DB::table('criteria')->get();
            $datas = array();
            foreach ($criterion as $key => $value) {
                if ($value <= 2) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type, 
                            ];
                }elseif($value <= 7) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type, 
                            ];
                } elseif ($value <= 15) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type, 
                            ];
                } else {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type, 
                            ];
                }


            }
            
            return view('user.student.survey.survey', compact('datas'));
        }
    }
}
