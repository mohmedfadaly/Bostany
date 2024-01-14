<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('website-locale')) {
            App::setLocale(session()->get('website-locale'));
        } elseif ($request->wantsJson() && $request->hasHeader('Accept-Language')) {
            App::setLocale($request->header('Accept-Language') === 'ar' ? 'ar' : 'en');
        }

        return $next($request);
    }
}
