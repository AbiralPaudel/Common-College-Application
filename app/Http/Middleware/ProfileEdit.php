<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfileEdit
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
        if(Auth::user()->id != $request->profile){
            return redirect('/home');
        }
        // if(Auth::user()->id != $request->profile_id){
        //     return redirect('/home');
        // }
        return $next($request);
    }
}
