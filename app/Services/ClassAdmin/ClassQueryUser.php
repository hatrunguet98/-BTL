<?php

namespace App\Services\ClassAdmin;

use Illuminate\Support\Facades\Auth;
use App\User;

class ClassQueryUser
{
    public static function delete($id)
    {
        $user = User::find($id);
    	User::where('id', $id)->update([
    		'status' => 0,
    	]);
    }

    public static function showUser($role_name)
    {
    	$user = User::select('users.id','users.username', 'users.name', 'users.email', 'roles.name as role', 'users.class')
        ->join('roles','users.role', '=', 'roles.id')
        ->where('roles.name',$role_name)
        ->where('status',1)
/*        ->orderBy('id', 'desc')*/
        ->Paginate(10);
        return $user;
    }
}
