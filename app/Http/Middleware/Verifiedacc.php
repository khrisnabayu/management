<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Verifiedacc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $verifiedacc)

    {
        $array_verifiedacc = explode ("|", $verifiedacc); 
        if (in_array($request->user()->verified_status, $array_verifiedacc)) {
            return $next($request);
        }
 
        return redirect()->to(route('login'));
    }
}
