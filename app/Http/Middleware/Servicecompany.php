<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class Servicecompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $servicecompany)

    {
        $service_id = DB::table('companyusers')->where('id', $request->user()->company_id)->value('service_id');

        $array_servicecompany = explode ("|", $servicecompany); 
        if (in_array($service_id, $array_servicecompany)) {
            return $next($request);
        }
 
        return redirect()->to(route('login'));
    }
}
