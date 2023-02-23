<?php

namespace App\Http\Middleware;

use App\Models\siteProperty;
use Closure;
use Illuminate\Http\Request;

class LockRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //this will return if the user already created all the record on DB
        $site = siteProperty::find(1);
        $checkReg = $site -> hasSetup;

        if($checkReg){
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
