<?php

namespace App\Http\Middleware;
use App\Models\Catrgories;
use Closure;
use Illuminate\Support\Facades\Session;

class chackCategory
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
        $count=Catrgories::all()->count();
        if($count==0){
             Session::flash('statuscode','info');
             session()->flash('error','Pleas Insert Category To ADD Post');
             return redirect ('/categories')->with('middlwaralert','Pleas Insert Category To ADD Post');

        //    return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
