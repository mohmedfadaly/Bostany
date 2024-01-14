<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;
class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!is_null($request->header('lang')))
        {
            if($request->header('lang') === 'ar' || $request->header('lang') === 'en')
            {
                App::setlocale($request->header('lang'));
            }else{
                App::setlocale('ar');
            }
        }else{
            App::setlocale('ar');
        }
        return $next($request);

    }
}
