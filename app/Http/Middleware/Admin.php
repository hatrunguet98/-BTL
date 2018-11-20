<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ClassAdmin\ClassRoleAdmin;

class Admin
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
        $req = ClassRoleAdmin::checkAdmin();
        if(!$req) {
            return redirect('/home');
        }

        return $next($request);
    }
}
