<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Subject;
use App\Semester;
use Illuminate\Support\Facades\DB;
use App\Services\ClassAdmin\ClassQueryUser;

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
    	dd($request->all());
    }
}
