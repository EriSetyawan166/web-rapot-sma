<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevelUser
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
        if($level == 1) {
            return redirect()->intended('admin\dashboard');
        }
        return $next($request);
    }
}
