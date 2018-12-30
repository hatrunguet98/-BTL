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
use App\Imports\CourseListStudent;
use Excel;
use App\Services\ClassResultSurvey;

class CourseController extends Controller
{ 
    // load thông tin vào trang course
    public function course(){
    	$courses = Course::select('courses.id as id','courses.code as code', 'courses.name as name', 'courses.semester as semester', 'users.name as user_name', 'users.id as user_id', 'courses.subject_id as code_id', 'user_courses.id as user_course_id')
            ->join('user_courses','courses.id', '=', 'user_courses.course_id')
            ->join('users', 'users.id', '=', 'user_courses.user_id')
            ->join('roles','roles.id','=', 'users.role')
            ->where('roles.name', 'giaovien')
            ->get();
        $subjects = Subject::all();
    	$semesters = Semester::all();
        $teachers = ClassQueryUser::showUser('giaovien');
	    return view('admin.courses.course',compact('courses','subjects','semesters','teachers'));
    }
    // load course bằng ajax()
    public function loadCourse(){
        $courses = Course::select('courses.id as id','courses.code as code', 'courses.name as name', 'courses.semester as semester', 'users.name as user_name', 'users.id as user_id', 'courses.subject_id as code_id','user_courses.id as user_course_id')
            ->join('user_courses','courses.id', '=', 'user_courses.course_id')
            ->join('users', 'users.id', '=', 'user_courses.user_id')
            ->join('roles','roles.id','=', 'users.role')
            ->where('roles.name', 'giaovien')
            ->Paginate(7);
        return view('admin.courses.ListCourse', compact('courses'))->render();
    }
    // load ra trang course
    public function allCourses(){
        return view('user.courses.courses');
    }
    // thêm môn học
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
        // kiểm tra môn học và giáo viên có tồn tại hay ko 
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
        }
       return redirect('/course');
    }
    // thêm sinh viên vào khóa học đã được tạo
    public function enrollStudent(Request $request) {
        $username = $request->username;
        $course_id = $request->id;
        $user = DB::table('users')->select('users.username', 'users.id')
            ->join('roles','users.role', '=', 'roles.id')
            ->where('users.status',1)
            ->where('roles.name','sinhvien')
            ->where('users.username',$username)->first();
        if($user) {
            $check = DB::table('user_courses')
            ->where('course_id', $course_id)
            ->where('user_id', $user->id)
            ->first();
            if($check){
                return response()->json(['errors'=>'Sinh viên đã được thêm vào khóa học']);
            }else {
                DB::table('user_courses')->insert([
                    'user_id' => $user->id,
                    'course_id' => $course_id,
                ]);
                $students  = DB::table('courses')->select('users.id as user_id','user_courses.id as id', 'users.username', 'users.name', 'users.email', 'users.class')
                                ->join('user_courses','user_courses.course_id','=','courses.id')
                                ->join('users','user_courses.user_id', '=', 'users.id')
                                ->join('roles','roles.id','=', 'users.role')
                                ->where('courses.id',$course_id)
                                ->where('roles.name','sinhvien')
                                ->get();
                return view('admin.courses.courseStudent.CourseStudent', compact('students','course_id'));
            }
        } else {
            return response()->json(['errors'=>'Tài khoản không tồn tại']);
        }
        return response()->json(['errors' => 'something errors']);
    }
    // load ajax danh sách sinh viên vào khóa học
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
    // thêm sửa thông tin course vào khóa học
    public function editCourse(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $id = $data['id'];
            $user_id = $data['user'];
            $semester = $data['semester'];
            $subject = $data['subject'];
            

            $course = DB::table('courses')
                ->select('courses.subject_id', 'courses.name', 'courses.code', 'courses.semester', 'user_courses.id as user_course_id', 'users.id as user_id')
                ->join('user_courses','user_courses.course_id', '=', 'courses.id')
                ->join('users','users.id', '=', 'user_courses.user_id')
                ->join('roles','roles.id', '=', 'users.role')
                ->where('roles.name', 'giaovien')
                ->where('courses.id', $id)
                ->first();
            $user_course_id = $course->user_course_id;

            if($course->user_id != $user_id){
                DB:table('user_courses')->where('id', $user_course_id)
                    ->update([
                        'user_id' => $user_id,
                    ]);
            }

            if($semester == 1) {
                $semester = 'Kì I'; 
            }elseif($semester == 2) {
                $semester = 'Kì II';
            } else {
                $semester = 'Kì Hè';
            }

            if($course->semester != $semester){
                DB::table('courses')->where('id', $id)
                    ->update([
                        'semester' => $semester,
                    ]);
            }
            
            if($course->subject_id != $subject){
                $course = DB::table('courses')
                    ->where('subject_id',  $subject)
                    ->orderBy('id', 'desc')
                    ->first();
                $sub = DB::table('subjects')
                    ->where('id', $data['code'])
                    ->first();
                $code = "";
                if(!$course){
                    $code = $sub->code . " 1";
                } else {
                    $code = $sub->code ." ".(substr($course->code,8) + 1);
                }
                DB::table('courses')->where('id', $id)
                    ->update([
                        'subject_id' => $subject,
                        'name' => $sub->name,
                        'code' => $code,
                    ]);
            }
            return $this->loadCourse();
        }
    }
    // xóa môn học 
    public function deleteCourse(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $course = DB::table('courses')->where('id',$id)->first();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date_format(now(),"Y-m-d H:i:s");
            $ret = DB::table('user_courses')
                ->where('user_id', $id)
                ->where('survey_id','<>',null)
                ->first();
            if($ret == null){
                return response()->json(['errors'=>'-Môn học đã có sinh viên!']);
            }
            if($course->status == 0){
                DB::table('courses')->where('id',$id)->delete();
            }else if($time < $course->start){
                DB::table('courses')->where('id',$id)->delete();
            }else {
                return response()->json(['errors'=>'Không thể xóa môn học đã bắt đầu đánh giá']);
            }
            return $this->loadCourse();
        }
    }
    // xóa sinh viên ra khỏi khóa học
    public function deleteUser(Request $request){
        if($request->ajax()){
            $user_course_id = $request->id;
            $check = DB::table('user_courses')
                ->where('id', $user_course_id)
                ->first();

            if($check){
                DB::table('user_courses')->where('id',$user_course_id)->delete();
                return response()->json(['success' => 'delete success']);
            } else {
                return response()->json(['errors'=>'something errors']);
            }
        }

        return response()->json(['errors'=>'something errors']);
    }
    // thêm sinh viên vào khóa học
    public function importStudentCourse(Request $request){
        if($request->hasFile('FILE')){
            Excel::import(new CourseListStudent, request()->file('FILE'));
            return redirect('/course');
        }
    }
    // xuất kết quả đánh giá cho trang admins
    public function resultCourse(Request $request){
        if($request->ajax()){
            $cal = new ClassResultSurvey;
            if($cal->resultSurvey($request) == 1){
                return response()->json(['errors'=>'Đánh giá môn học chưa được tạo!']);
            }
            if(!$cal->resultSurvey($request)){
                return response()->json(['errors'=>'Đánh giá môn học chưa kết thúc !']);
            } else {
                return view('user.teacher.result.result', $cal->resultSurvey($request));
            }
        }
    }
}
