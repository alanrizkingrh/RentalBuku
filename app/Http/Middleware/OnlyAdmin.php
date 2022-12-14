<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
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
        //jika yang login akun bukan admin maka middleware akan me redirect ke /
       if(Auth::user()->role_id != 1) {
        return redirect('/books');
       }
       //jika yang login akun admin maka middleware akan membiarkan login ke dashboar
       return $next($request);
    }
}
