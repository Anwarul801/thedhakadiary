<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Toastr;
use Closure;
use Illuminate\Http\Request;

class AuthorMiddleware
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
        if (auth()->check()){
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
                return $next($request);
            }
        }
        if (isEnglish()){
            return redirect()->route('index_page')->with('error', 'You Are Not Eligible to access this page');
        }else{
            return redirect()->route('index_page')->with('error', 'আপনি এই পৃষ্ঠাটি অ্যাক্সেস করার যোগ্য নন।');
        }
    }
}
