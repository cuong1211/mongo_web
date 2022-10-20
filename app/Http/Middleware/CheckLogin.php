<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckLogin
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
        if(Auth::check()){
           // dd(Auth::user());
            $user = Auth::user();
            if($user->isAdmin == 1 || $user->isAdmin == 0){
                return $next($request);
            }else{
                Auth::logout();
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }
}
