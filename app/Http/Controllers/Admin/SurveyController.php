<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Criterion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SurveyController extends Controller
{
    // kiểm tra quyền người dùng
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    // gọi đến trang đánh giá
    public function survey() {
    	return view('admin.surveys.survey');
    }
    // lấy ra danh môn học đã khảo sát
    public function loadSurvey(){
        $courses = Course::where('status',1)->Paginate(5);
        return view('admin.surveys.listSurvey',compact('courses'))->render();
    }
    // danh sách các tiếu trí đánh giá
    public function generate() {
        $criteria = DB::table('criteria')->where('status',1)->get();
        $types = DB::table('criteria')->select('type')->distinct()->get();
        $type = array();
        $i = 0;
        foreach ($types as $key => $value) {
            $type += [
                $i => $value->type,
            ];
            $i++;
        }
        return view('admin.surveys.generate', compact('criteria','type'));
    }
    // lấy ra các môn học chưa tạo cuộc đánh giá
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
    // thêm cuộc khảo sát
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
    // xuất ra các tiêu trí đánh giá của 1 môn học
    public function viewSurvey(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $courses = DB::table('courses')
                        ->where('id',$id)
                        ->first();
            $criterion = json_decode($courses->criterion);
            $data = DB::table('criteria')->get();
            $criteria = array();
            foreach ($data as $key => $value) {
                $criteria += [
                    $value->id => $value,
                ];
            }
            $datas = array();
            foreach ($criterion as $key => $value) {
                $datas[] = [
                    'id' => $criteria[$value]->id,
                    'name' => $criteria[$value]->name,
                    'type' => $criteria[$value]->type,
                ];
            }
            $start = Carbon::parse($courses->start)->format('Y-m-d');
            $finish = Carbon::parse($courses->finish)->format('Y-m-d');
            $types = DB::table('criteria')->select('type')->distinct()->get();
            $type = array();
            $i = 0;
            foreach ($types as $key => $value){
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }
            return view('admin.surveys.showSurvey', compact('datas','start','finish','type'));
        }
    }
    // lấy ra thông tin của  cuộc khảo sát
    public function editSurvey(Request $request) {
        if($request->ajax()){
            $id = $request->id;
            $courses = DB::table('courses')
                        ->where('id',$id)
                        ->first();
            $criterion = json_decode($courses->criterion);
            $data = DB::table('criteria')->get();
            $criteria = array();
            foreach ($data as $key => $value) {
                $criteria += [
                    $value->id => $value,
                ];
            }
            $datas = array();
            foreach ($criterion as $key => $value) {
                $datas += [
                $criteria[$value]->id => [
                        'id' => $criteria[$value]->id,
                        'name' => $criteria[$value]->name,
                        'type' => $criteria[$value]->type,
                        'status' => $criteria[$value]->status, 
                    ],
                ];
            }
            $dat = DB::table('criteria')
                ->where('status', '0')
                ->get();
            $crit = array();
            foreach ($dat as $key => $value) {
                $crit += [
                    $value->id => $value,
                ];
            }

            foreach ($criterion as $key => $value) {
                if(isset($crit[$value])) {
                    $ret[] = [
                        'id' => $crit[$value]->id,
                        'name' => $crit[$value]->name,
                        'type' => $crit[$value]->type,
                        'status' => $crit[$value]->status, 
                    ];
                }
            }

            $data_1 = $dat = DB::table('criteria')
                ->where('status', '1')
                ->get();
            $results = array();
            foreach ($data_1 as $key => $value) {
                $results += 
                [   
                $value->id  => [
                        'id' => $value->id,
                        'name' => $value->name,
                        'type' => $value->type,
                        'status' => $value->status,
                    ],
                ];
            }
            foreach ($crit as $key => $value) {
               $results += 
                [   
                $value->id  => [
                        'id' => $value->id,
                        'name' => $value->name,
                        'type' => $value->type,
                        'status' => $value->status,
                    ],
                ];
            }


            $start = Carbon::parse($courses->start)->format('Y-m-d');
            $finish = Carbon::parse($courses->finish)->format('Y-m-d');
            $types = DB::table('criteria')->select('type')->distinct()->get();
            $type = array();
            $i = 0;
            foreach ($types as $key => $value) {
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }
            
            return view('admin.surveys.editSurvey', compact('datas','results','start', 'finish','type','id'));
        }
    }
    // update các tiêu trí đánh giá của cuộc khảo sát
    public function submitEditSurvey(Request $request){
        if($request->ajax()){
            $course_id = $request->id;
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
            DB::table('courses')->where('id',$course_id)
                ->update([
                    'criterion' => $criterion,
                    'start' => $start,
                    'finish' => $finish,
                ]);
            return $this->loadSurvey();
        }
        return response()->json(['errors'=>'some thing errors']);
    }
    // thêm cuộc khảo sát
    public function surveyInsert(Request $request){
        if($request->ajax()){
            $name = $request->name;
            $typeNumber = $request->type;
            $types = DB::table('criteria')->select('type')->distinct()->get();
            $type = array();
            $i = 0;
            foreach ($types as $key => $value) {
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }
            $check = DB::table('criteria')
            ->where('name', $name)
            ->where('type', $type[$typeNumber])
            ->where('status', 1)
            ->first();
            if(!$check){
                DB::table('criteria')->insert([
                    'name' => $name,
                    'type' => $type[$typeNumber],
                ]);
            }elseif($check->name != $name || $check->type != $type[$typeNumber]){
                DB::table('criteria')->insert([
                    'name' => $name,
                    'type' => $type[$typeNumber],
                ]);
            }
            $criteria = DB::table('criteria')->where('status',1)->get();
            return view('admin.surveys.setDefault.Criterion', compact('criteria','type'));
        }
        return response()->json(['errors'=>'some thing errors']);
    }
    // lấy ra các tiêu trí đánh gái
    public function loadCriterion(){
        $criteria = DB::table('criteria')->where('status',1)->get();
        $types = DB::table('criteria')->select('type')->distinct()->get();
        $type = array();
        $i = 0;
        foreach ($types as $key => $value) {
            $type += [
                $i => $value->type,
            ];
            $i++;
        }
        return view('admin.surveys.setDefault.Criterion', compact('criteria','type'));
    }
    // xóa các tiêu trí
    public function deleteCriterion(Request $request){
        if($request->ajax()){
            $id = $request->id;
            DB::table('criteria')->where('id', $id)
                ->update([
                    'status' => '0',
                ]);
            return response()->json(['success'=>'success']);
        }
        return response()->json(['errors'=>'some thing errors']);
    }
    // xuất ra các tiêu trí
    public function editCriterion(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $types = DB::table('criteria')->select('type')->distinct()->get();
            $typeNumber = $request->type;
            $name = $request->name;
            $type = array();
            $i = 0;
            foreach ($types as $key => $value) {
                $type += [
                    $i => $value->type,
                ];
                $i++;
            }
            DB::table('criteria')->where('id',$id)
                ->update([
                    'type' => $type[$typeNumber],
                    'name' => $name,
                ]);
            $criteria = DB::table('criteria')->where('status',1)->get();
            return view('admin.surveys.setDefault.Criterion', compact('criteria','type'));
        }
    }
    // xóa 1 cuộc khảo sát
    public function deleteSurvey(Request $request){
        if($request->ajax()){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date_format(now(),"Y-m-d H:i:s");
            $id = $request->id;
            $course = DB::table('courses')->where('id', $id)->first();
            $start = $course->start;
            if($start >= $time) {
                DB::table('courses')->where('id', $id)->update([
                    'status' => '0',
                    'criterion' => NULL,
                    'start' => NULL,
                    'finish' => NULL,
                ]);
                return response()->json(['success'=>'Đánh giá đã được xóa']);
            } else {
                return response()->json(['errors'=>'- Không thể xóa môn học đã bắt đầu đánh giá !']);
            }
        }
        return response()->json(['errors'=>'something errors']);
    }
}