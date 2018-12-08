<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Criterion;

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

    public function surveyGenerate(){
        $criteria = Criterion::all();
        $courses = Course::where('status',0)->get();
		return view('admin.surveys.generate', compact('criteria','courses'));
    }

    public function surveyEdit() {
    	return view('admin.surveys.edit');
    }
}
