<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ClassHasDelete
{
    public static function checkDelete()
    {
    	$status = Auth::user()->status;
        if($status) {
        	return true;
        } else {
        	return false;
        }
    }
}
