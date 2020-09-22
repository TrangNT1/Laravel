<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Closure;
use Illuminate\Support\Facades\Redirect;

class authencation
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
        $chucnang = DB::table('chucnangs')
            ->where('routename', Route::currentRouterName())
            ->first();
        if (isset($chucnang->id)) {
            $quyen = DB::table('chucnang_users')
                ->where('users_id', Auth::user()->id)
                ->where('chucnangs_id', $chucnang->id)
                ->first();
            if ($quyen && $quyen->users_id == Auth::user()->id) {
                return $next($request);
            } else {
                return redirect('khongcoquyen');
            }
        } else {
            return redirect('khongcoquyen');
        }
    }
}
