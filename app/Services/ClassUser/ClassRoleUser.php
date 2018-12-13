<?php

namespace App\Services\ClassUser;

use Illuminate\Support\Facades\Auth;

class ClassRoleUser
{
    public static function checkStudent()
    {
    	$role = Auth::user()->role;
        $user = Auth::user()->Role()->where('id',$role)->first()->name;
        if($user == 'sinhvien') {
        	return true;
        } else {
        	return false;
        }
    }

    public static function checkTeacher()
    {
    	$role = Auth::user()->role;
        $user = Auth::user()->Role()->where('id',$role)->first()->name;
        if($user == 'giaovien') {
        	return true;
        } else {
        	return false;
        }
    }
}
