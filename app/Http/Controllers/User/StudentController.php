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
        $this->middleware('delete');
        $this->middleware('student');
    }
    
    public function student(){
    	$id = Auth::user()->id;
    	$courses = DB::table('courses')
                    ->select('courses.id as course_id', 'courses.name as course_name', 'courses.code as code', 'user_courses.id as user_courses_id')
    				->join('user_courses','user_courses.course_id', '=', 'courses.id')
    				->join('users','users.id', '=', 'user_courses.user_id')
    				->where('users.id',$id)
                    ->get();
    	return view('user.student.students', compact('courses'));
    }

    public function survey(Request $request) {
    	if($request->ajax()){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $user_id = Auth::user()->id;
            $user_course_id = $request->id;
            $course = DB::table('user_courses')
                            ->select('courses.name')
                            ->where('user_courses.id', $user_course_id)
                            ->join('courses','courses.id', '=', 'user_courses.course_id')
                            ->first()->name;
            $courses = DB::table('courses')
                        ->select('courses.id as course_id', 'courses.criterion as criterion', 'courses.name as course_name', 'courses.code as code', 'users.id as user_id', 'courses.start as start', 'courses.finish as finish')
                        ->join('user_courses','user_courses.course_id', '=', 'courses.id')
                        ->join('users','users.id', '=', 'user_courses.user_id')
                        ->where('user_courses.id', $user_course_id)
                        ->first();
            $time = date_format(now(),"Y-m-d H:i:s");
            $start = $courses->start;
            $finish = $courses->finish;
            if($time < $start){
                return response()->json(['errors' => 'Đánh giá môn học này chưa mở']);
            }

            if($time > $finish){
                return response()->json(['errors' => 'Đánh giá môn học này đã kết thúc']);
            }

            $criterion = json_decode($courses->criterion);

            $criteria = DB::table('criteria')->get();
            $datas = array();
            $check = DB::table('user_courses')->select('surveys.evaluate', 'surveys.comment')
                    ->where('user_courses.id',$user_course_id)
                    ->join('surveys','surveys.id', '=', 'user_courses.survey_id')
                    ->first();
            $evaluate = $check->evaluate;
            $comment = $check->comment;
            $evaluate = json_decode(($evaluate));
            $array = array();
            foreach ($evaluate as $key => $value) {
                $array[] = $value;
            }
            foreach ($criterion as $key => $value) {
                if ($value <= 2) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type,
                                'value' => $array[$value-1],
                            ];
                }elseif($value <= 7) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type,
                                'value' => $array[$value-1],
                            ];
                } elseif ($value <= 15) {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type, 
                                'value' => $array[$value-1],
                            ];
                } else {
                    $datas[] = [
                                'id' => $criteria[$value-1]->id,
                                'name' => $criteria[$value-1]->name,
                                'type' => $criteria[$value-1]->type,
                                'value' => $array[$value-1],
                            ];
                }
            }
            return view('user.student.survey.survey', compact('datas','course','comment'));
        }
    }

    public function insertSurvey(Request $request) {
        $comment = $request->comment;
        $user_course_id = $request->user_course_id;
        $request = $request->all();
        $array = array();
        foreach ($request as $key => $value) {
            if(substr($key, 0,6) == 'survey'){
                $array += [substr($key, 6) => $value];
            }
        }
        $evaluate = json_encode($array);
        $checkSurvey = DB::table('user_courses')
                        ->where('id', $user_course_id)
                        ->first()->survey_id;
        if(!$checkSurvey) {
            $survey = DB::table('surveys')->insert([
                'evaluate' => $evaluate,
            ]);
            $survey_id = DB::table('surveys')->orderBy('id', 'desc')->first()->id;
            DB::table('user_courses')
                ->where('id', $user_course_id)
                ->update(['survey_id' => $survey_id]);
            return response()->json(['success' => 'survey success']);
        } else {
            DB::table('surveys')
                ->where('id', $checkSurvey)
                ->update([
                    'evaluate' => $evaluate,
                    'comment' => $comment,
                ]);
            return response()->json(['success' => 'survey update']);
        }
        return response()->json(['errors' => 'somethings errors']);
    }
}
