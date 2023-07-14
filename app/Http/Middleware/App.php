<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;
use Auth;
use Session;

class App
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
        //return $next($request);
        // if(Auth::user()){
        //    if(Auth::user()->user_type == " ") {
        //         //Session::flash('success', trans('You are successfully logged in'));
        //         return redirect('pastor/create')->with('successLogin', trans('You are successfully logged in'));
        //     } else {
        //         return redirect()->guest('/')->with('error', trans('Signup to see the entire site features'));
        //     } 
        // }
         Session::flash('success', trans('You are successfully logged in'));
        return redirect('app');   
    }
}
