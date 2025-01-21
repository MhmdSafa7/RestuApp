<?php
// filepath: /c:/maaref/capstone project/resto1/app/Http/Middleware/IsModerator.php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsModerator
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
        if (Auth::check() && Auth::user()->isModerator()) {
            return $next($request);
        }

        return redirect('/');
    }
}
