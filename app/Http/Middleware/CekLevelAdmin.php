<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevelAdmin
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
        $level = $request->session()->get("role_user");
        if($level == 0) {
            return redirect()->intended('user\dashboard');
        }
        return $next($request);
    }
}
