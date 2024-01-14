<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;

use Closure;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Artisan;


class Roles
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

        $permissions = Auth::user()->Role->routes;
        $permissions    = json_decode($permissions);

        if (in_array(Route::currentRouteName(), $permissions) != false)
        {
            return $next($request);
        }else
        {
            return redirect()->route('error.roles');


        }
        
    }
}
