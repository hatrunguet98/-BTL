<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard() {
    	return view('admin.dashboard.dashboard');
    }
}
