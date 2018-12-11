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
    	$courses = Course::where('status',0)->get();
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

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die;

        return "{\"data\": ".json_encode($data)."}";
        //return json_encode($data);
    }

    public function surveyEdit() {
    	return view('admin.surveys.edit');
    }

    public function surveyRegister(Request $request) {
        $data = $request->all();
        foreach ($data as $key => $value) {
           
        }

        dd($request->all());
    }
}
