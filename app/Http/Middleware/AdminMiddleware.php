<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Toastr;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (auth()->user()->role_id == 1) {
            return $next($request);
        }
        \Brian2694\Toastr\Facades\Toastr::Success('You Are Not Admin');
        return back();
    }
}
