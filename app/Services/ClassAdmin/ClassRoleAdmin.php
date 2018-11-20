<?php

namespace App\Services\ClassAdmin;

use Illuminate\Support\Facades\Auth;

class ClassRoleAdmin
{
    public static function checkAdmin()
    {
    	$role = Auth::user()->role;
        $user = Auth::user()->Role()->where('id',$role)->first()->name;
        if($user == 'admin') {
        	return true;
        } else {
        	return false;
        }
    }
}
