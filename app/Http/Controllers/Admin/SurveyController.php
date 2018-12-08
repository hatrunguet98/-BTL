<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function survey() {
    	$courses = Course::all();
    	return view('admin.surveys.survey',compact('courses'));
    }

    public function surveyGenerate(){
		return view('admin.surveys.generate');
    }

    public function surveyEdit() {
    	return view('admin.surveys.edit');
    }
}
