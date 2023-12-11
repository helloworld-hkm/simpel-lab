<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class maintenanceRepair
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ): Response
    {
        if(auth()->user()->role->id==4 || auth()->user()->role->id==5){
            return $next($request);
        }

        abort(403, 'Akses ditolak');
        // return view('cek');
    }
}
