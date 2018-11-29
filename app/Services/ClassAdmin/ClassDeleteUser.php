<?php

namespace App\Services\ClassAdmin;

use Illuminate\Support\Facades\Auth;
use App\User;

class ClassDeleteUser
{
    public static function delete($id)
    {
    	$user = User::find($id);
    	User::where('id', $id)->update([
    		'status' => 0,
    	]);
    }
}
