<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Criterion;
use Illuminate\Support\Facades\DB;


class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function survey() {
    	$courses = Course::where('status',1)->get();
    	return view('admin.surveys.survey',compact('courses'));
    }

    public function generate() {
        $criteria = Criterion::all();
        return view('admin.surveys.generate', compact('criteria'));
    }

    public function surveyGenerate(){
        $courses = DB::table('courses')->select( 'courses.id as id','courses.name as course_name', 'courses.code as code','users.name as user_name')
            ->join('user_courses','courses.id', '=','user_courses.course_id')
            ->join('users','user_courses.user_id', '=','users.id')
            ->join('roles', 'users.role', '=', 'roles.id')
            ->where('courses.status',0)
            ->where('roles.name', '=', 'giaovien')->get();
        $data = array();
        foreach ($courses as $value) {
            $record = array();
            $record[] = $value->id;
            $record[] = $value->course_name;
            $record[] = $value->code;
            $record[] = $value->user_name;
            $data[] = $record;
        }
        return "{\"data\": ".json_encode($data)."}";
    }

    public function surveyEdit() {
    	return view('admin.surveys.edit');
    }

    public function surveyRegister(Request $request) {
        $courses = $request->courses;
        $start = date_create($request->start . ' 00:00:00');
        $start = date_format($start,"Y-m-d H:i:s");
        $finish = date_create($request->finish . ' 23:59:59');
        $finish = date_format($finish,"Y-m-d H:i:s");
        $data = $request->all();
        $criteria = array();
        foreach ($data as $key => $value) {
            if(substr($key, 0,6) == 'survey' ){
                $criteria[] = substr($key, 6);
            }

        }
        $criterion =  json_encode($criteria);
        foreach($courses as $course) {
            DB::table('courses')->where('id',$course)
                ->update([
                    'status' => '1',
                    'criterion' => $criterion,
                    'start' => $start,
                    'finish' => $finish,
                ]);
        }
        return $this->generate();
    }

    public function viewSurvey(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $courses = DB::table('courses')
                        ->where('id',$id)
                        ->first();
            $criterion = json_decode($courses->criterion);
            $criteria = DB::table('criteria')->get();
            $datas = array();
            foreach ($criterion as $key => $value) {
                $datas[] = [
                    'id' => $criteria[$value-1]->id,
                    'name' => $criteria[$value-1]->name,
                ];
            }
            $start = $courses->start;
            $finish = $courses->finish;
            return view('admin.surveys.showSurvey', compact('datas','start','finish'));
        }
    }
}