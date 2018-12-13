<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ClassUser\ClassRoleUser;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $req = ClassRoleUser::checkStudent();
        if(!$req) {
            return redirect('/');
        }
        return $next($request);
    }
}
