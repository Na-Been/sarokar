<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (config('app.api_password') != $request->header('Authorization')) {
            return response()->json('Unauthorized', 401);
        }
        return $next($request);
    }

}
