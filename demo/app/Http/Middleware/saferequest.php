<?php

namespace App\Http\Middleware;

use Closure;

class saferequest
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
        $stdout = fopen('php://stdout', 'w');
        fwrite($stdout, "Start" .Router::currentRouterName()."". date("Y-m-d H:i:s"));
        $r = $next($request);
        fwrite($stdout, "End" .Router::currentRouterName()."". date("Y-m-d H:i:s"));
        foreach($_POST as $key => $value){
            
        }
        return $r;
    }
}
