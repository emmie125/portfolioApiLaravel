<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Request-Methods', 'HEAD, GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Accept, Authorization,Content-Type');
        $response->header('Access-Control-Request-Headers', 'Accept, Authorization,Content-Type');

       
        return $response;
    }
}
