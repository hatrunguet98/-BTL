<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClassResultSurvey
{
	public function resultSurvey($request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date_format(now(),"Y-m-d H:i:s");
		$user_course_id = $request->id;

		$course_id = DB::table('user_courses')->where('id',$user_course_id)->first()->course_id;
        $user_id = DB::table('user_courses')->where('id',$user_course_id)->first()->user_id;
    	$course = DB::table('courses')->where('id',$course_id)->first();

    	if($now < $course->finish){
            return 0;
        }

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

        if($criterion == null){
            return 1;
        }
    	foreach ($criterion as $key => $value) {
            //Trung bình
            $sum = 0;
            foreach ($data as $item) {
                $sum += $item[$value];
            }
            if(count($data) == 0){
                $M = 0;
            } else {
                $M = $sum/count($data);
            }

            //Độ lệch chuẩn
            $s = 0;
            foreach($data as $item){
                $b=$item[$value]-$M;
                $s += ($b*$b);
            }
            if(count($data) == 0){
                $Ps = 0;
            } else {
                $Ps = $s / count($data);
            }
            $STD = sqrt($Ps);

            //Trung bình và độ lệch chuẩn với các lớp cùng môn học
            $calculate1 = array();
            $calculate1[] = $M;
            foreach ($sameSubjectAverage as $item) {
                $calculate1[] = isset($item[$value]) ? $item[$value] : 0;
            }
            $calculateResult1 = $this->STD($calculate1);

            //Trung bình và độ lệch chuẩn với các lớp cùng giáo viên
            $calculate2 = array();
            $calculate2[] = $M;
            foreach ($sameTeacherAverage as $item) {
                $calculate2[] = isset($item[$value]) ? $item[$value] : 0;
            }
            $calculateResult2 = $this->STD($calculate2);

    		$results[] = [
    			'id' => '1',
    			'name' => $criteria[$value],
    			'M' => round($M,2),
    			'STD' => round($STD,2),
    			'M1' => round($calculateResult1['m'],2),
    			'STD1' => round($calculateResult1['std'],2),
    			'M2' => round($calculateResult2['m'],2),
    			'STD2' => round($calculateResult2['std'],2),
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
            ->join('users','users.id', '=', 'user_courses.user_id')
            ->join('roles', 'roles.id', '=', 'users.role')
            ->where('roles.name', 'giaovien')
            ->where('courses.code', 'like', $subject_code.'%')
            ->where('courses.semester', '=', $subject_semester)
            ->distinct()
            ->get();

        $about['quantity-teacher'] = count($allTeacher);
        $about['quantity-subject'] = count($sameTeachers) + 1;
        $about['course-code'] = $course_code;
        $about['semester'] = $course->semester;
        return compact('results','type', 'about');
        
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