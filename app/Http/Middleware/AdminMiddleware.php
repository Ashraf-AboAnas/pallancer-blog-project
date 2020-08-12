<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use admin;
use Illuminate\Support\Facades\Session;
class AdminMiddleware
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

        if(Auth::user()->usertype=='admin'||Auth::user()->usertype=='writer'){
            return $next($request);

        }
        else{

          return redirect ('/home')->with('status','YOu Are NOt Allowed To Dashboard');
        }

    }
}
