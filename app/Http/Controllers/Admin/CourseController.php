<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Subject;
use App\Semester;
use Illuminate\Support\Facades\DB;
use App\Services\ClassAdmin\ClassQueryUser;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function course(){
    	$courses = Course::all();
    	$subjects = Subject::all();
    	$semesters = Semester::all();
        $teachers = ClassQueryUser::showUser('giaovien');
	    return view('admin.courses.course',compact('courses','subjects','semesters','teachers'));
    }

    public function addCourse(Request $request){
        $data = $request->all();
        $semesters = DB::table('semesters')
                    ->where('id',$data['semester'])
                    ->first();
        $subject = DB::table('subjects')
                    ->where('id', $data['code'])
                    ->first();
        $course = DB::table('courses')
                    ->where('subject_id', $data['code'])
                    ->orderBy('id', 'desc')
                    ->first();
        $admin_id = Auth::user()->id;

        if($subject) {
            $code = "";
            if(!$course){
                $code = $subject->code . " 1";
                
            } else {
                $code = $subject->code ." ".(substr($course->code,8) + 1);
            }
            $subject_id = $subject->id;
            $subject_name = $subject->name;
            $semester = $semesters->name;
            DB::table('courses')->insert([
                'admin_id' => $admin_id,
                'code' => $code,
                'subject_id' => $subject_id,
                'name' => $subject_name,
                'semester' => $semester,
            ]);
        } else {
            dd("@@@");
        }
       return redirect('/course');
    }
}
