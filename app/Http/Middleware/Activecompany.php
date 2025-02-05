<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class Activecompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $activecompany)

    {
        $active_status = DB::table('companyusers')->where('id', $request->user()->company_id)->value('active_status');

        $array_activecompany = explode ("|", $activecompany); 
        if (in_array($active_status, $array_activecompany)) {
            return $next($request);
        }
 
        return redirect()->to(route('login'));
    }
}
