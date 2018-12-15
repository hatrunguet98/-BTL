<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ClassHasDelete;
use Illuminate\Support\Facades\Auth;

class HasDelete
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
        $req = ClassHasDelete::checkDelete();
        if(!$req) {
            Auth::logout();
            return redirect('login');
        }
        return $next($request);
    }
}
