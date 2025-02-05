<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Activeacc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $activeacc)

    {
        $array_activeacc = explode ("|", $activeacc); 
        if (in_array($request->user()->active_status, $array_activeacc)) {
            return $next($request);
        }
 
        return redirect()->to(route('login'));
    }
}
