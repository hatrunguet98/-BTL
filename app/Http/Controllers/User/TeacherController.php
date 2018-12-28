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
            $user_id = DB::table('user_courses')->where('id',$user_course_id)->first()->user_id;

    		$surveys = DB::table('user_courses')->select( 'surveys.evaluate')
	    		->join('surveys','surveys.id', '=', 'user_courses.survey_id')
	    		->where('user_courses.course_id', $course_id)
	    		->get();

    		$data = array();
            foreach ($surveys as $survey) {
                $object = json_decode($survey->evaluate);
                $temp = array();
                foreach ($object as $key => $row) {
                    $temp[$key] = $row;
                }
                $data[] = $temp;
            }


	    	$course = DB::table('courses')->where('id',$course_id)->first();
            $course_code = $course->code;
            $subject_code = substr($course_code,0,7);
            $subject_semester = $course->semester;
	    	$criterion = json_decode($course->criterion);

	    	$temp = DB::table('criteria')->get();
            $criteria = array();
            foreach ($temp as $key => $value) {
                $criteria[$value->id] = $value->name;
            }


            //Trung bình các lớp khác cùng môn học
            $sameSubjects = DB::table('courses')->select( 'id')
                ->where('code', 'like', $subject_code.'%')
                ->where('semester', $subject_semester)
                ->where('id', '<>', $course_id)
                ->get();

            $sameSubjectAverage = array();
            foreach ($sameSubjects as $sameSubject) {
                $check = $this->average($sameSubject->id);
                if ($check != 0)
                $sameSubjectAverage[] = $this->average($sameSubject->id);
            }


            //Trung bình các lớp cùng giáo viên
            $sameTeachers = DB::table('courses')->select( 'courses.id')
                ->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
                ->where('user_courses.user_id', '=', $user_id)
                ->where('courses.semester', $subject_semester)
                ->where('course_id', '<>', $course_id)
                ->get();


            $sameTeacherAverage = array();
            foreach ($sameTeachers as $sameTeacher) {
                $check = $this->average($sameTeacher->id);
                if ($check != 0)
                $sameTeacherAverage[] = $this->average($sameTeacher->id);
            }


	    	foreach ($criterion as $key => $value) {
                //Trung bình
                $sum = 0;
                foreach ($data as $item) {
                    $sum += $item[$value];
                }

                $M = $sum/count($data);

                //Độ lệch chuẩn
                $s = 0;
                foreach($data as $item){
                    $b=$item[$value]-$M;
                    $s += ($b*$b);
                }
                $Ps = $s / count($data);
                $STD = sqrt($Ps);

                //Trung bình và độ lệch chuẩn với các lớp cùng môn học
                $calculate = array();
                $calculate[] = $M;
                foreach ($sameSubjectAverage as $item) {
                    $calculate[] = isset($item[$value]) ? $item[$value] : 0;
                }
                $calculateResult1 = $this->STD($calculate);

                //Trung bình và độ lệch chuẩn với các lớp cùng giáo viên
                $calculate = array();
                $calculate[] = $M;
                foreach ($sameTeacherAverage as $item) {
                    $calculate[] = isset($item[$value]) ? $item[$value] : 0;
                }
                $calculateResult2 = $this->STD($calculate);

	    		$results[] = [
	    			'id' => '1',
	    			'name' => $criteria[$value],
	    			'M' => round($M,1),
	    			'STD' => round($STD,1),
	    			'M1' => $calculateResult1['m'],
	    			'STD1' => $calculateResult1['std'],
	    			'M2' => $calculateResult2['m'],
	    			'STD2' => $calculateResult2['std'],
	    		];
	    	}

	    	//Các kiểu đánh giá
	    	$types = DB::table('criteria')->select('type')->distinct()->get();
            $type = array();
            $i = 0;
            foreach ($types as $key => $value){
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }

            //Các thông tin liên quan
            $about = array();
            $about['sublect-name'] = $course->name;
            $users = DB::table('users')->select('name')
                ->where('id', '=', $user_id)
                ->first();
            $about['teacher-name'] = $users->name;
            $about['quantity-student'] = count($data);
            $allTeacher = DB::table('user_courses')->select('user_courses.user_id')
                ->join('courses', 'courses.id','=' , 'user_courses.course_id')
                ->where('courses.code', 'like', $subject_code.'%')
                ->whereNull('user_courses.survey_id')
                ->where('courses.semester', '=', $subject_semester)
                ->distinct()
                ->get();

            //dd(count($allTeacher));
            $about['quantity-teacher'] = count($allTeacher);
            $about['quantity-subject'] = count($sameTeachers) + 1;
            $about['subject-code'] = $subject_code;
	        return view('user.teacher.result.result', compact('results','type', 'about'));
    	}
    }

    //Tính trung bình cho lớp có course_id
    private function average ($course_id) {

        $surveys = DB::table('user_courses')->select( 'surveys.evaluate')
            ->join('surveys','surveys.id', '=', 'user_courses.survey_id')
            ->where('user_courses.course_id', $course_id)
            ->get();


        $data = array();
        foreach ($surveys as $survey) {
            $object = json_decode($survey->evaluate);
            $temp = array();
            foreach ($object as $key => $row) {
                $temp[$key] = $row;
            }
            $data[] = $temp;
        }

        if (count($data) == 0) {
            return 0;
        }

        $course = DB::table('courses')->where('id',$course_id)->first();
        $criterion = json_decode($course->criterion);

        $temp = DB::table('criteria')->get();
        $criteria = array();
        foreach ($temp as $key => $value) {
            $criteria[$value->id] = $value->name;
        }

        $result = array();

        foreach ($criterion as $key => $value) {

            $sum = 0;
            foreach ($data as $item) {
                $sum += $item[$value];
            }
            $M = $sum/count($data);
            $result[$value] = $M;
        }

        return $result;
    }

    //Tính trung bình và độ lệch chuẩn cho 1 mảng
    private function STD($data){
        $result = array();
	    $sum = 0;
        foreach ($data as $value) {
            $sum += $value;
        }

        $M = $sum / count($data);
        $result['m'] = $M;
	    $s = 0;
        foreach($data as $value){
            $b=$value-$M;
            $s += ($b*$b);
        }

        $Ps = $s / count($data);
        $STD = sqrt($Ps);
        $result['std'] = $STD;
        return $result;
    }
}
