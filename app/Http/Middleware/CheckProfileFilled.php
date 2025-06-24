<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileFilled
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
        $user = auth()->user();
        if ($user && $user->first_name) {
            if (!$user->userAddress()->exists()) {
                return redirect()->route('frontend.profile')->with(toast('Please Add Address', 'info'));
            }
            return $next($request);
        }
        return redirect()->route('frontend.profile')->with(toast('Please complete your Profile', 'info'));
    }
}
