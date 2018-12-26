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

    public function allCourses(){
        return view('user.courses.courses');
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
        $teacher = DB::table('users')
                    ->select('users.id as id', 'users.name as name', 'users.email as email')
                    ->join('roles','roles.id', '=', 'users.role')
                    ->where('roles.name','giaovien')
                    ->where('users.id', $data['user'])
                    ->first();
        if($subject && $teacher) {
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
            $course_id = DB::table('courses')->orderBy('id', 'desc')->first()->id;
            DB::table('user_courses')->insert([
                'user_id' => $teacher->id,
                'course_id' => $course_id,
            ]);
        } else {
            dd("@@@");
        }
       return redirect('/course');
    }

    public function enrollStudent(Request $request) {
        $username = $request->username;
        $course_id = $request->id;
        $user = DB::table('users')->join('roles','users.role', '=', 'roles.id')
            ->where('users.status',1)
            ->where('roles.name','sinhvien')
            ->where('users.username',$username)->first();
        if($user) {
            DB::table('user_courses')->insert([
                'user_id' => $user->id,
                'course_id' => $course_id,
            ]);
        } else {
            return response()->json(['errors'=>'Tài khoản không tồn tại']);
        }
        $students  = DB::table('courses')->select('users.id as user_id','user_courses.id as id', 'users.username', 'users.name', 'users.email', 'users.class')
                        ->join('user_courses','user_courses.course_id','=','courses.id')
                        ->join('users','user_courses.user_id', '=', 'users.id')
                        ->join('roles','roles.id','=', 'users.role')
                        ->where('courses.id',$course_id)
                        ->where('roles.name','sinhvien')
                        ->get();
            return view('admin.courses.courseStudent.CourseStudent', compact('students','course_id'));
    }

    public function studentsCourse(Request $request){
        if($request->ajax()) {
            $course_id = $request->id;
            $students  = DB::table('courses')->select('users.id as user_id','user_courses.id as id', 'users.username', 'users.name', 'users.email', 'users.class')
                        ->join('user_courses','user_courses.course_id','=','courses.id')
                        ->join('users','user_courses.user_id', '=', 'users.id')
                        ->join('roles','roles.id','=', 'users.role')
                        ->where('courses.id',$course_id)
                        ->where('roles.name','sinhvien')
                        ->get();
            return view('admin.courses.courseStudent.CourseStudent', compact('students','course_id'));
        }
    }
}
