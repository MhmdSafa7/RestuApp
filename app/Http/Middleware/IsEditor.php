<?php
// filepath: /c:/maaref/capstone project/resto1/app/Http/Middleware/IsEditor.php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsEditor
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
        if (Auth::check() && Auth::user()->isEditor()) {
            return $next($request);
        }

        return redirect('/');
    }
}
