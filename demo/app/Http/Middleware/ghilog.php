<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class ghilog
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
        $stdout = fopen('php://stdout','w');
        fwrite($stdout,"Start". date("Y-m-d H:i:s"));
        $r= $next($request);
        fwrite($stdout,"End". date("Y-m-d H:i:s"));
      
        return redirect('khongcoquyen');
    }
}
