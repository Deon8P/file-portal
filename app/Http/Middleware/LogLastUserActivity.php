<?php

namespace Dockable\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Closure;

class LogLastUserActivity
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
        if(Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }


}
