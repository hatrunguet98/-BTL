<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ClassUser\ClassRoleUser;

class Teacher
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
        $req = ClassRoleUser::checkTeacher();
        if(!$req) {
            return redirect('/');
        }
        return $next($request);
    }
}
