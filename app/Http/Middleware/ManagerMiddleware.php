<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('adminLogin')->with('warning','Please login first to access adminstrator');
        }else{
            if(Auth::user()->role != 'quit'){
                return $next($request);
            }else{
                return redirect()->route('adminLogin')->with('error','Your account was out of access rights');
            }
           
        }
    }
}
